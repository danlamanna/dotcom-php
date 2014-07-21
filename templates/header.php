<html>
  <head>
    <script type="text/javascript">
     var _gaq = _gaq || [];
     _gaq.push(['_setAccount', 'UA-24868293-1']);
     _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();
    </script>

    <link rel="stylesheet" type="text/css" href="/static/bootstrap.min.css" />

    <style type="text/css">
     body {
       padding-top: 20px;
       padding-bottom: 40px;
     }

     .container-narrow {
       margin: 0 auto;
       max-width: 850px;
     }
     .container-narrow > hr {
       margin: 30px 0;
     }
    </style>
    <?php if (isset($title)): ?>
      <title><?php echo $title; ?> | dan lamanna</title>
    <?php else: ?>
      <title>dan lamanna</title>
    <?php endif; ?>
  </head>

  <body>
    <div class="container-narrow">
      <div class="masthead">
        <h3 class="muted" style="margin-bottom:3px;"><a href="/">dan lamanna</a></h3>
        <h3 style="font-size: 12px;margin-top: 0px;padding-top: 0px;line-height: 0;">emacs, lisp, python, django, flask, git</h3>
      </div>
      <hr />
