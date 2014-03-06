$( document ).ready(function() 
{
	$( "#pages" ).autocomplete({
		// PRO
		source: "http://xxx/xxx/search_db/search.php",
		// PRE
		//source: "http://xxx/xxx/search_db/search.php",
		// LOCAL
		//source: "http://xxx/xxx/search_db/search.php"",
		minLength: 2,
		response: function( event, ui ) {
			$('#body').css({ 'height' : "230px", 'width' : "200px" });
		},
		select: function( event, ui ) 
		{
			$('#dvLoading').css("display","block");
			$.ajax({
				url: ui.item.url,
				success: function(data) 
				{
					$('#dvLoading').css("display","none");
					chrome.tabs.create(
						{url:ui.item.url}
					);  
				}
			});
		}
	});
	
	$( "#pages" ).focus();
});

/*
chrome.windows.onCreated.addListener(function() 
{
	alert("funciona");
	// Change icon
	chrome.browserAction.setIcon({
		path:"../img/mvAviso.png"
	});
});

chrome.webNavigation.onDOMContentLoaded.addListener(function() 
{
	alert("funciona");
	window.setInterval(function() 
	{
		$.ajax({
			url: "http://localhost/Google chrome extension test/alerts/alert.php",
			success: function(data) 
			{
				if (data.item != "")
				{
					// Change icon
					chrome.browserAction.setIcon({
						path:"../img/mvAviso.png"
					});
					
					// Save it using the Chrome extension storage API.
					chrome.storage.sync.set({'value': data.item});
				}
			}
		});
		
	}, 5000);
});
*/
