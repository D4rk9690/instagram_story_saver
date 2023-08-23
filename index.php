<!DOCTYPE html>
<html>
<head>
    <title>Your PHP Web Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/prettify.css">
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?lang=css&amp;skin=sunburst"></script>

<style>
    pre {
        font-size:10px;
    }

    .code {
        width:80%;
        user-select:all;
        background-color: #5C8374;
        color: white;
        font-family:verdana;
    }


    body {
        margin:0;
        width: 100vw;
        height: 90vh;
        overflow:hidden;
        background:#1d1d1d;
    }

    .headerclass{
        background-color: #183D3D;
        height: 80px;
        color: white;
        font-family:verdana;
    }

    .headerclass h1{
        margin: 0px;
        padding: 0px;
        text-align: center;
    }
    .headerclass h2{
        margin: 0px;
        padding: 0px;
        text-align: center;
        color: darkgrey;
        font-size: 20px;
    }

</style>
</head>
<body>


<div class="headerclass">
<h1>Noah Documentations Personnel</h1>
<h2>Comment récupérer et stocker toutes les story d'un utilisateur instagram.</h2>


</div>


<div class="code">
    <h4>CHAP 1: Récupérer les story</h4>
    <p>Première étape, vous avez besoin d'un API qui récupère les story d'un utilisateur précis.</p>
<pre class="code-block prettyprint lang-php">
    // USED API: https://instasupersave.com/fr/instagram-story-viewer/
    // USAGE EXEMPLE:
    $data = json_decode(file_get_content("https://instasupersave.com/api/ig/stories/16954857593"));
</pre>
</div>


<script>

</script>

</body>
</html>
