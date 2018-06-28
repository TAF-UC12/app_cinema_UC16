// JavaScript Document

	//service worker

  	if ('serviceWorker' in navigator) {
  		navigator.serviceWorker.register('js/service-worker.js')
    	.then(function () {
        console.log('service worker registered');
      })
      .catch(function () {
        console.log('service worker failed');
      });
  }