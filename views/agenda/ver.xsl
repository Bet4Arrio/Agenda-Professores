<xsl:variable name="maxItems" select="10" />
<xsl:variable name="sequence" select="any-sequence"/>

<xsl:for-each select="$sequence">

    <!-- Maybe sort first -->
    <xsl:sort select="@sort-by" order="descending" />

    <!-- where the magic happens -->
    <xsl:if test="$maxItems > position()">
        do something
    </xsl:if>
</xsl:for-each>