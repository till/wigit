<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php print $wigit->getTitle() ?> &raquo; Editing <?php print $wigit->getPageHTML() ?></title>
		<link rel="stylesheet" type="text/css" href="<?php print $wigit->getCSSURL() ?>" />
	</head>
	<body>
		<div id="navigation">
			<p><a href="<?php print $wigit->getHomeURL() ?>">Home</a> 
			| <a href="<?php print $wigit->getGlobalHistoryURL() ?>">History</a>
			| <a href="<?php print $wigit->getGlobalIndexURL() ?>">Index</a>
			<?php if ($wigit->getUser() != "") { ?>| Logged in as <?php print $wigit->getUser(); } ?>
			</p>
		</div>

		<div id="header">
			<h1 id="title">Editing <?php print $wigit->getPageHTML() ?></h1>
		</div>

		<div id="form">
			<form method="post" action="<?php print $wigit->getPostURL(); ?>">
				<p><textarea name="data" cols="80" rows="20" style="width: 100%"><?php print $wigit->getRawData(); ?></textarea></p>
				<p><input type="submit" value="publish" /></p>
			</form>
		</div>

		<div id="footer" style='text-align: left;'>
			<p class='syntax'>
				<span style='font-weight: bold;'>Syntax:</span> Besides normal HTML
				code (e.g. <code>&lt;b&gt;Bold&lt;/b&gt;</code>), the following 
				markup is available as well:
				<ul>
					<li><code>[SomePage]</code>: Internal link to SomePage</li>
					<li><code>h1. Section</code>, <code>h2. Subsection</code>: 
						Section headers</li>
					<li><code># Item</code>, <code>## Second-level item</code>:
						Enumerated list</li>
					<li><code>* Item</code>, <code>** Second-level item</code>:
						Itemized list</li>
					<li><code>"Some URL":http://someurl.com</code>: External links</li>
					<li><code>!/path/to/image.jpg!</code>: Embedded images</li>
					<li><code>_Emphasised text_, *strong text*, ??citations??, @code@,
						+Inserted text+, -Removed text-</code> &rarr; 
						<em>Emphasized text</em>, <strong>strong text</strong>,
						<cite>citation</cite>, <ins>inserted text</ins>, <del>removed
						text</del></li>
					<li><code>H~2~O, A^2^</code> &rarr; H<sub>2</sub>O, A<sup>2</sup></li>
					<li><code>Abbr(Abbreviation)</code> &rarr; <acronym tytle="Abbreviation">Abbr</acronym></li>
					<li><code>|Cell 1|Cell 2|</code>: Tables</li>
					<li><code>%{color:red}Red% text</code> &rarr; <span style='color:red'>Red</span> text</li>
				</ul>
				For more markup styles, see the 
				<a href="http://hobix.com/textile/">Textile reference</a>.
			</p>
		</div>

        <?php include __DIR__ . '/plug.php'; ?>

	</body>
</html>
