self.addEventListener("install", e => {
  e.waitUntil(
    caches.open("raceedge-store").then(cache => {
      return cache.addAll([
        "index.html",
        "dashboard.html",
        "training.html",
        "leaderboard.html",
        "favicon-64.png",
        "logo-512.png",
        "manifest.json"
      ]);
    })
  );
});

self.addEventListener("fetch", e => {
  e.respondWith(
    caches.match(e.request).then(response => {
      return response || fetch(e.request);
    })
  );
});
