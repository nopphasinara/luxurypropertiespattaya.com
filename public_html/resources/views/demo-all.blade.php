@extends('layouts.main')

@section('content')
  <div class="network-fake">
    <label><input type="checkbox"> Fake network delay</label>
  </div>
  <div class="story"></div>
  <svg class="spinner" viewBox="0 0 100 100" width="20" height="20">
    <circle cx="50" cy="50" r="42" transform="rotate(-90,50,50)" />
  </svg>
  <script>
  var fakeSlowNetwork;

  (function() {
    var lsKey = 'fake-slow-network';
    var networkFakeDiv = document.querySelector('.network-fake');
    var checkbox = networkFakeDiv.querySelector('input');

    fakeSlowNetwork = Number(localStorage.getItem(lsKey)) || 0;

    networkFakeDiv.style.display = 'block';
    checkbox.checked = !!fakeSlowNetwork;

    checkbox.addEventListener('change', function() {
      localStorage.setItem(lsKey, Number(checkbox.checked));
      location.reload();
    });
  }());

  function spawn(generatorFunc) {
    function continuer(verb, arg) {
      var result;
      try {
        result = generator[verb](arg);
      } catch (err) {
        return Promise.reject(err);
      }
      if (result.done) {
        return result.value;
      } else {
        return Promise.resolve(result.value).then(callback, errback);
      }
    }
    var generator = generatorFunc();
    var callback = continuer.bind(continuer, "next");
    var errback = continuer.bind(continuer, "throw");
    return callback();
  }

  function wait(ms) {
    return new Promise(function(resolve) {
      setTimeout(resolve, ms);
    });
  }

  function get(url) {
    // Return a new promise.
    // We do all the work within the constructor callback.
    var fakeNetworkWait = wait(3000 * Math.random() * fakeSlowNetwork);

    var requestPromise = new Promise(function(resolve, reject) {
      // Do the usual XHR stuff
      var req = new XMLHttpRequest();
      req.open('get', url);

      req.onload = function() {
        // 'load' triggers for 404s etc
        // so check the status
        if (req.status == 200) {
          // Resolve the promise with the response text
          resolve(req.response);
        }
        else {
          // Otherwise reject with the status text
          reject(Error(req.statusText));
        }
      };

      // Handle network errors
      req.onerror = function() {
        reject(Error("Network Error"));
      };

      // Make the request
      req.send();
    });

    return Promise.all([fakeNetworkWait, requestPromise]).then(function(results) {
      return results[1];
    });
  }

  function getJson(url) {
    return get(url).then(JSON.parse);
  }

  function getSync(url) {
    var startTime = Date.now();
    var waitTime = 3000 * Math.random() * fakeSlowNetwork;

    var req = new XMLHttpRequest();
    req.open('get', url, false);
    req.send();

    while (waitTime > Date.now() - startTime);

    if (req.status == 200) {
      return req.response;
    }
    else {
      throw Error(req.statusText || "Request failed");
    }
  }

  function getJsonSync(url) {
    return JSON.parse(getSync(url));
  }

  function getJsonCallback(url, callback) {
    getJson(url).then(function(response) {
      callback(undefined, response);
    }, function(err) {
      callback(err);
    });
  }

  var storyDiv = document.querySelector('.story');

  function addHtmlToPage(content) {
    var div = document.createElement('div');
    div.innerHTML = content;
    storyDiv.appendChild(div);
  }

  function addTextToPage(content) {
    var p = document.createElement('p');
    p.textContent = content;
    storyDiv.appendChild(p);
  }
  </script>
  <script>
  getJson('{{ asset("lib/story.json") }}').then(function(story) {
    addHtmlToPage(story.heading);
    // Take an array of promises and wait on them all
    return Promise.all(
      // Map our array of chapter urls
      // to an array of chapter json promises
      story.chapterUrls.map(getJson)
    );
  }).then(function(chapters) {
    // Now we have the chapters jsons in order! Loop thorugh…
    chapters.forEach(function(chapter) {
      // …and add to the page
      addHtmlToPage(chapter.html);
    });
    addTextToPage("All done");
  }).catch(function(err) {
    // catch any error that happened along the way
    addTextToPage("Argh, broken: " + err.message);
  }).then(function() {
    document.querySelector('.spinner').style.display = 'none';
  });
  </script>
@endsection
