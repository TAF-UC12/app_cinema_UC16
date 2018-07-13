var CACHE_NAME = 'PLAY';

self.addEventListener('install', function (event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function (cache) {
      return cache.addAll([
		
	  '../',  
      '../index.php',
      '/app.js',
      '../css/estilo.css',
	  '../css/index.css',  
	  '../css/menu.css',
	  '../css/categorias.css',
	  '../css/ficha_tecnica.css',
	  '../css/lancamentos.css',
	  '../css/noticias.css',    
      '../img/icon48px.png',
      '../img/icon96px.png',
	  '../img/icon192px.png',

      ]);
    })
  )
});


self.addEventListener('activate', function activator(event) {
  event.waitUntil(
    caches.keys().then(function (keys) {
      return Promise.all(keys
        .filter(function (key) {
          return key.indexOf(CACHE_NAME) !== 0;
        })
        .map(function (key) {
          return caches.delete(key);
        })
      );
    })
  );
});


self.addEventListener('fetch', function (event) {
  event.respondWith(
    caches.match(event.request).then(function (cachedResponse) {
      return cachedResponse || fetch(event.request);
    })
  );
});

