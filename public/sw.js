const CACHE_NAME = 'ezofz-cache-v1';
const urlsToCache = [
  '/',
  '/tools/unicode-typing',
  '/tools/name-converter',
  '/documents',
  '/about',
  '/contact',
  '/css/app.css',
  '/js/app.js',
  '/images/logo.png',
  '/manifest.json'
];

// Install Service Worker
self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

// Fetch
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }

        return fetch(event.request).then(
          function(response) {
            // Check if we received a valid response
            if(!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // IMPORTANT: Clone the response. A response is a stream
            // and because we want the browser to consume the response
            // as well as the cache consuming the response, we need
            // to clone it so we have two streams.
            var responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function(cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          }
        );
      })
    );
});

// Activate Service Worker
self.addEventListener('activate', function(event) {
  var cacheWhitelist = [CACHE_NAME];

  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// Background Sync (optional)
self.addEventListener('sync', function(event) {
  if (event.tag == 'background-sync') {
    event.waitUntil(doBackgroundSync());
  }
});

function doBackgroundSync() {
  // Add background sync logic if needed
  return Promise.resolve();
}

// Push notifications (optional)
self.addEventListener('push', function(event) {
  if (event.data) {
    const data = event.data.json();
    const options = {
      body: data.body,
      icon: '/images/icons/icon-192x192.png',
      badge: '/images/icons/icon-72x72.png',
      data: data.data || {}
    };

    event.waitUntil(
      self.registration.showNotification(data.title, options)
    );
  }
});

// Handle notification clicks
self.addEventListener('notificationclick', function(event) {
  event.notification.close();

  event.waitUntil(
    clients.openWindow('/')
  );
});
