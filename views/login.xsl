<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet  xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
    <html> 
      <head>
      </head>
      <body bgcolor="#eee">
        <div class="main" style="background:lightblue;">
          <form action="" method="post">
            <label for="matricula">Matricula</label>
              <input type="text" name="matricula"/>
              <label for="matricula">Senha</label>
            <input type="password" name="senha"/>
          </form>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>