<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet  xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
    <html> 
      <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Login</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"/> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"/>
      </head>
      <body>

      <section class="hero is-large is-info is-fullheight">
        <nav>
          <a href="logout">SAIR</a>
        </nav>
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="title">
              Sua Agenda 
            </h1>
            <div class="columns is-centered">
              <div class="column is-6 box">
              
              </div>
            </div>
          </div>
        </div>
      </section>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>