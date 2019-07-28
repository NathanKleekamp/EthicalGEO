function getQueryParams(href) {
  var link;
  var queryParamString;
  var queryParams = {};

  link = document.createElement('a')
  link.href = href;

  // drop the initial question mark
  queryParamString = link.search.slice(1, link.search.length);

  queryParamString.split('&').forEach(function splitParam(param) {
    var splitted = param.split('=');
    queryParams[splitted[0]] = splitted[1];
  });

  return queryParams;
}

var disqus_config = function() {
  var queryParams = getQueryParams(window.location.href);
  this.page.identifier = queryParams.video_id;
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://ethicalgeo.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
