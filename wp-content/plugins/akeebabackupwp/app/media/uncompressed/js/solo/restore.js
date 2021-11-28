/**
 * @package     Solo
 * @copyright Copyright (c)2014-2018 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 3 or later
 */

if (typeof akeeba === "undefined")
{
	var akeeba = {};
}

if (typeof akeeba.Restore === "undefined")
{
	akeeba.Restore = {
		lastResponseSeconds: 0, timer: 0, errorCallback: null, statistics: {
			inbytes: 0, outbytes: 0, files: 0
		}, factory         : null, password: null, ajaxURL: null, mainURL: null, translations: {}
	};
}

/**
 * Callback script for AJAX errors
 * @param msg
 * @return
 */
akeeba.Restore.errorCallbackDefault = function (msg)
{
	document.getElementById("restoration-progress").style.display = "none";
	document.getElementById("restoration-error").style.display    = "block";
	document.getElementById("backup-error-message").innerHTML     = msg;
};

/**
 * Performs an AJAX request to the restoration script (restore.php)
 *
 * @param data
 * @param successCallback
 * @param errorCallback
 *
 * @return
 */
akeeba.Restore.doAjax = function (data, successCallback, errorCallback)
{
	json = JSON.stringify(data);

	var post_data = {
		json: json
	};

	// Authentication method for Akeeba Restore 5.4.0 or later: send the password
	if (akeeba.Restore.password.length > 0)
	{
		post_data.password = akeeba.Restore.password;
	}

	// Make the request skip the cache appending the microsecond timestamp an extra, ignored query string parameter.
	var now                     = new Date().getTime() / 1000;
	var s                       = parseInt(now, 10);
	post_data._cacheBustingJunk = Math.round((now - s) * 1000);

	var structure = {
		type   : "POST",
		url    : akeeba.Restore.ajaxURL,
		cache  : false,
		data   : post_data,
		timeout: 600000,
		success: function (msg)
		{
			// Initialize
			var junk    = null;
			var message = "";

			// Get rid of junk before the data
			var valid_pos = msg.indexOf("###");

			if (valid_pos == -1)
			{
				// Valid data not found in the response
				msg = "Invalid AJAX data: " + msg;

				if (errorCallback == null)
				{
					if (akeeba.Restore.errorCallback != null)
					{
						akeeba.Restore.errorCallback(msg);
					}
					else
					{
						akeeba.Restore.errorCallbackDefault(msg);
					}
				}
				else
				{
					errorCallback(msg);
				}

				return;
			}
			else if (valid_pos != 0)
			{
				// Data is prefixed with junk
				junk    = msg.substr(0, valid_pos);
				message = msg.substr(valid_pos);
			}
			else
			{
				message = msg;
			}

			message = message.substr(3); // Remove triple hash in the beginning

			// Get of rid of junk after the data
			valid_pos = message.lastIndexOf("###");
			message   = message.substr(0, valid_pos); // Remove triple hash in the end


			try
			{
				var data = JSON.parse(message);
			}
			catch (err)
			{
				errorMessage = err.message + "\n<br/>\n<pre>\n" + message + "\n</pre>";
				if (errorCallback == null)
				{
					if (akeeba.Restore.errorCallback != null)
					{
						akeeba.Restore.errorCallback(errorMessage);
					}
					else
					{
						akeeba.Restore.errorCallbackDefault(errorMessage);
					}
				}
				else
				{
					errorCallback(errorMessage);
				}
				return;
			}

			// Call the callback function
			successCallback(data);
		},
		error  : function (Request, textStatus, errorThrown)
		{
			var text    = Request.responseText ? Request.responseText : "";
			var message = "<strong>AJAX Loading Error</strong><br/>HTTP Status: " + Request.status + " (" + Request.statusText + ")<br/>";

			message = message + "Internal status: " + textStatus + "<br/>";
			message = message + "XHR ReadyState: " + Request.readyState + "<br/>";
			message = message + "Raw server response:<br/>" + akeeba.System.sanitizeErrorMessage(text);


			if (errorCallback == null)
			{
				if (akeeba.Restore.errorCallback != null)
				{
					akeeba.Restore.errorCallback(message);
				}
				else
				{
					akeeba.Restore.errorCallbackDefault(message);
				}
			}
			else
			{
				errorCallback(message);
			}
		}
	};

	akeeba.Ajax.ajax(structure);
};

/**
 * Starts the timer for the last response timer
 *
 * @param   max_allowance  Maximum time allowance in seconds
 * @param   bias           Runtime bias in %
 */
akeeba.Restore.startTimeoutBar = function (max_allowance, bias)
{
	akeeba.Restore.resetTimeoutBar();

	akeeba.Restore.timer = setInterval(function ()
									   {
										   akeeba.Restore.lastResponseSeconds++;

										   var lastText = akeeba.Restore.translations["COM_AKEEBA_BACKUP_TEXT_LASTRESPONSE"]
										   .replace("%s", akeeba.Restore.lastResponseSeconds.toFixed(0));

										   try
										   {
											   document.getElementById(
												   "response-timer div.text").textContent = lastText;
										   }
										   catch (e)
										   {
										   }
									   }, 1000);
};

/**
 * Resets the last response timer bar
 */
akeeba.Restore.resetTimeoutBar = function ()
{
	akeeba.Restore.lastResponseSeconds = 0;

	if (akeeba.Restore.timer == 0)
	{
		return;
	}

	clearInterval(akeeba.Restore.timer);
	akeeba.Restore.timer = 0;

	var timerText = document.getElementById("response-timer").querySelector("div.text");
	var lastText  = akeeba.Restore.translations["COM_AKEEBA_BACKUP_TEXT_LASTRESPONSE"].replace("%s", "0");

	try
	{
		timerText.textContent = lastText;
	}
	catch (e)
	{
	}
};

/**
 * Pings the restoration script (making sure its executable!!)
 * @return
 */
akeeba.Restore.pingRestoration = function ()
{
	// Reset variables
	akeeba.Restore.statistics.inbytes  = 0;
	akeeba.Restore.statistics.outbytes = 0;
	akeeba.Restore.statistics.files    = 0;

	// Do AJAX post
	var post = {task: "ping"};
	akeeba.Restore.startTimeoutBar(5000, 80);
	akeeba.Restore.doAjax(post, function (data)
	{
		akeeba.Restore.start(data);
	});
};

/**
 * Starts the restoration
 * @return
 */
akeeba.Restore.start = function ()
{
	// Reset variables
	akeeba.Restore.statistics.inbytes  = 0;
	akeeba.Restore.statistics.outbytes = 0;
	akeeba.Restore.statistics.files    = 0;

	// Do AJAX post
	var post = {task: "startRestore"};
	akeeba.Restore.startTimeoutBar(5000, 80);
	akeeba.Restore.doAjax(post, function (data)
	{
		akeeba.Restore.step(data);
	});
};

/**
 * Steps through the restoration
 * @param data
 * @return
 */
akeeba.Restore.step = function (data)
{
	akeeba.Restore.resetTimeoutBar();

	if (data.status == false)
	{
		// handle failure
		akeeba.Restore.errorCallbackDefault(data.message);
	}
	else
	{
		if (data.done)
		{
			akeeba.Restore.factory                                          = data.factory;
			// handle finish
			document.getElementById("restoration-progress").style.display   = "none";
			document.getElementById("restoration-extract-ok").style.display = "block";
		}
		else
		{
			// Add data to variables
			akeeba.Restore.statistics.inbytes += data.bytesIn;
			akeeba.Restore.statistics.outbytes += data.bytesOut;
			akeeba.Restore.statistics.files += data.files;

			// Display data
			try
			{
				document.getElementById("extbytesin").textContent  = akeeba.Restore.statistics.inbytes;
				document.getElementById("extbytesout").textContent = akeeba.Restore.statistics.outbytes;
				document.getElementById("extfiles").textContent    = akeeba.Restore.statistics.files;
			}
			catch (e)
			{
			}

			// Do AJAX post
			post = {
				task: "stepRestore", factory: data.factory
			};
			akeeba.Restore.startTimeoutBar(5000, 80);
			akeeba.Restore.doAjax(post, function (data)
			{
				akeeba.Restore.step(data);
			});
		}
	}
};

akeeba.Restore.finalize = function ()
{
	// Do AJAX post
	var post = {task: "finalizeRestore", factory: akeeba.Restore.factory};
	akeeba.Restore.startTimeoutBar(5000, 80);
	akeeba.Restore.doAjax(post, function (data)
	{
		akeeba.Restore.finished(data);
	});
};

akeeba.Restore.finished = function ()
{
	// We're just finished - return to the back-end Control Panel
	window.location = akeeba.Restore.mainURL;
};

akeeba.Restore.runInstaller = function (rootURL)
{
	window.open(rootURL + '/installation/index.php', 'abiinstaller');

	var runInstaller = document.getElementById("restoration-runinstaller");
	var finalize     = document.getElementById("restoration-finalize");

	runInstaller.className = 'akeeba-btn--grey--small';
	finalize.style.display = "block";
};

akeeba.Restore.restoreDefaultOptions = function ()
{
	var jpskey = document.getElementById("jps_key");

	if (jpskey)
	{
		jpskey.value = "ChromeIsDumb";
		jpskey.value = "";
	}
};

akeeba.Restore.onProcEngineChange = function (e)
{
	var procEngine   = document.getElementById("procengine").value;
	var elFTPOptions = document.getElementById("ftpOptions");
	var elFTPText    = document.getElementById("ftp_test");

	elFTPOptions.style.display = "none";
	elFTPText.style.display    = "none";

	if (procEngine != "direct")
	{
		elFTPOptions.style.display = "block";
		elFTPText.style.display    = "inline-block";
	}
};
