<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet  xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
    <html> 
      <head>
      </head>
      <body bgcolor="#eee">
        <div class="main" style="background:lightblue;">
          <table  border="1">
          <tr bgcolor="#9acd32">
            <td>Incio</td>
            <td>Fim</td>
            <td>Nome</td>
            <td>Status</td>
          </tr>

            <xsl:for-each select="ProfessorData/Horario/list/Agendamento">
              <tr>
                <td> <xsl:value-of select="dataIncio"/></td>
                <td> <xsl:value-of select="datafinal"/></td>
                <td> <xsl:value-of select="tarefa_nome"/></td>
                <td> <xsl:value-of select="status"/></td>
              </tr>
            </xsl:for-each>
          
          </table>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>