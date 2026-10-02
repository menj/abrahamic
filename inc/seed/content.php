<?php
/**
 * Starter content for abrahamic-religions.com, used by inc/seed.php.
 * Starter content as block markup; edit it here, then raise ABR_SEED_VERSION for new or changed items.
 * parent: key of the parent page. description: search description, 130 characters or fewer.
 * Items keep their key forever: renaming a key makes the seeder treat it as new.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

return array(
	'terms' => array(
		array( 'key' => 'category:religion', 'taxonomy' => 'category', 'slug' => 'religion', 'name' => 'Religion', 'description' => 'Introductions to the Abrahamic traditions and their shared heritage.', 'since' => 1 ),
		array( 'key' => 'category:history', 'taxonomy' => 'category', 'slug' => 'history', 'name' => 'History', 'description' => 'The history of Judaism, Mandaeism, Christianity and Islam from antiquity to the present.', 'previous' => 'The history of Judaism, Christianity and Islam from antiquity to the present.', 'since' => 1 ),
		array( 'key' => 'category:scripture', 'taxonomy' => 'category', 'slug' => 'scripture', 'name' => 'Scripture', 'description' => 'The sacred texts of the Abrahamic traditions and how they are read.', 'since' => 1 ),
		array( 'key' => 'category:theology', 'taxonomy' => 'category', 'slug' => 'theology', 'name' => 'Theology', 'description' => 'Beliefs about God, revelation and salvation across the traditions.', 'since' => 1 ),
		array( 'key' => 'category:culture', 'taxonomy' => 'category', 'slug' => 'culture', 'name' => 'Culture', 'description' => 'Worship, practice and everyday religious life.', 'since' => 1 ),
		array( 'key' => 'category:philosophy', 'taxonomy' => 'category', 'slug' => 'philosophy', 'name' => 'Philosophy', 'description' => 'Faith, reason and the philosophical traditions of the Abrahamic religions.', 'previous' => 'Faith, reason and the philosophical traditions of the three religions.', 'since' => 1 ),
		array( 'key' => 'category:archaeology', 'taxonomy' => 'category', 'slug' => 'archaeology', 'name' => 'Archaeology', 'description' => 'Material evidence for the world of the Abrahamic scriptures.', 'since' => 1 ),
		array( 'key' => 'category:interfaith-studies', 'taxonomy' => 'category', 'slug' => 'interfaith-studies', 'name' => 'Interfaith studies', 'description' => 'Encounter, dialogue and cooperation among the Abrahamic communities.', 'previous' => 'Encounter, dialogue and cooperation among Jews, Christians and Muslims.', 'since' => 1 ),
	),
	'items' => array(
		array(
			'key' => 'page:home', 'photo' => array( 'name' => 'page-home', 'alt' => 'The Abrahamic faiths on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'home', 'title' => 'Home', 'parent' => '',
			'excerpt' => 'An independent educational resource on Judaism, Mandaeism, Christianity and Islam.', 'description' => 'The Abrahamic faiths explained: Judaism, Mandaeism, Christianity and Islam, their scriptures, history and beliefs. Explore.', 'menu_order' => 0, 'special' => 'front', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">On this page</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-abrahamic-faiths-at-a-glance">The Abrahamic faiths at a glance</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#where-to-begin">Where to begin</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-abrahamic-faiths-at-a-glance"} -->
<h2 class="wp-block-heading" id="the-abrahamic-faiths-at-a-glance">The Abrahamic faiths at a glance</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Abrahamic faiths are the religions that trace themselves to Abraham: Judaism, Mandaeism, Christianity and Islam. Together they are followed by more than half of humanity, on every continent. This guide sets out the history, scriptures, beliefs and practices of each, the figures and places they share, and where they agree and where they differ, with sources for every claim and a Journal of longer essays on the questions readers ask most. Start with the <a href="/religions/">four religions</a>, explore the <a href="/reference/">reference section</a>, or read the latest articles in the <a href="/journal/">Journal</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"where-to-begin"} -->
<h2 class="wp-block-heading" id="where-to-begin">Where to begin</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>New readers can begin with the question at the heart of the site, why four traditions share one forefather, answered in the <a href="/reference/faq/">frequently asked questions</a>. From there the <a href="/reference/timeline/">timeline</a> sets the story in order, and the <a href="/reference/comparisons/">comparisons</a> show where the traditions meet and part.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Abrahamic Religions is an independent educational resource on the histories, scriptures, beliefs and practices of Judaism, Mandaeism, Christianity and Islam, and on the heritage these traditions share.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://quran.com/">The Qur’an (Quran.com)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:articles', 'photo' => array( 'name' => 'page-articles', 'alt' => 'The Journal on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'journal', 'title' => 'Journal', 'parent' => '',
			'excerpt' => 'Explainers and essays on the history, scripture and thought of the Abrahamic traditions.', 'description' => 'The Journal: footnoted essays on the history, scripture and thought of the Abrahamic religions. Read the latest.', 'menu_order' => 1, 'special' => 'posts', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">On this page</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#about-the-journal">About the Journal</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-the-essays-are-written">How the essays are written</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"about-the-journal"} -->
<h2 class="wp-block-heading" id="about-the-journal">About the Journal</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Journal publishes essays on the history, scripture and thought of the Abrahamic religions. Each article is footnoted to its sources, from the Qur’an and the Bible to classical commentators and modern scholarship, and every claim can be checked against the original. New essays appear regularly, on figures, places, texts and the questions readers ask most. Browse the essays by <a href="/journal/topics/">topic</a> or by tag, or start with <a href="/journal/who-was-abraham/">Who was Abraham?</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-the-essays-are-written"} -->
<h2 class="wp-block-heading" id="how-the-essays-are-written">How the essays are written</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Every essay is written from the primary sources, checked against the best modern scholarship, and footnoted so that readers can follow each claim to its origin. Qur’anic verses are given in Arabic and English, and photographs are credited to their makers.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Explainers and essays on the history, scripture and thought of the Abrahamic traditions.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://quran.com/">The Qur’an (Quran.com)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:judaism', 'photo' => array( 'name' => 'page-judaism', 'alt' => 'Judaism on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'judaism', 'title' => 'Judaism', 'parent' => 'page:guides',
			'excerpt' => 'An introduction to Jewish history, scripture, practice and the movements of Jewish life today.', 'description' => 'Jewish history, scripture, practice and movements today, explained for new readers. Read our introduction to Judaism.', 'menu_order' => 2, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Judaism is the religion of the Jewish people, rooted in the covenant that the Hebrew Bible describes between God and the descendants of Abraham, Isaac and Jacob. It is the oldest of the three great monotheistic traditions of the Near East, and the ground from which Christianity and Islam later grew. Close to sixteen million Jews live worldwide, most of them in Israel and the United States.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#origins-and-covenant">Judaism: origins and covenant</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#belief-and-conduct">Belief and conduct</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#scripture-and-interpretation">Scripture and interpretation</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#practice-and-the-calendar">Practice and the calendar</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#jewish-life-today">Jewish life today</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"origins-and-covenant"} -->
<h2 class="wp-block-heading" id="origins-and-covenant">Judaism: origins and covenant</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jewish tradition traces its beginnings to <a href="/journal/who-was-abraham/">Abraham</a>, who in the biblical account leaves his homeland at God's call, and to the covenant renewed with <a href="/reference/figures/#moses">Moses</a> at Mount Sinai after the exodus from Egypt. The ancient Israelites formed kingdoms in the land of Canaan, built the First Temple in Jerusalem, and experienced exile in Babylon after the Temple's destruction in 586 BCE. A Second Temple stood from 516 BCE until the Romans destroyed it in 70 CE.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Judaism gave the world its first sustained account of one God. The Shema (<span lang="he" dir="rtl">שמע</span>, "hear"), recited morning and evening, opens with the declaration that the Lord is one.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Later Jewish teaching read the formula naming the God of Abraham, Isaac and Jacob as pointing to three qualities revealed in turn: steadfast love, awe, and the search for truth.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Jewish teaching holds that God's care extends to all people, and that the covenant with Israel lays a charge on those within it: the community is to live in a way that makes God's justice visible.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"belief-and-conduct"} -->
<h2 class="wp-block-heading" id="belief-and-conduct">Belief and conduct</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism has no binding creed. Conduct carries the weight that doctrine carries elsewhere, and considerable latitude remains in matters of belief, including the messianic future and life after death. <a href="/journal/faith-and-reason/">Maimonides</a> set out thirteen principles in the twelfth century, and they are widely honoured without functioning as a test of membership.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"scripture-and-interpretation"} -->
<h2 class="wp-block-heading" id="scripture-and-interpretation">Scripture and interpretation</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a>, or Tanakh (<span lang="he" dir="rtl">תנ״ך</span>, from the initials of its three parts), comprises the Torah (<span lang="he" dir="rtl">תורה</span>, "instruction"), the five books of Moses; the Nevi'im (<span lang="he" dir="rtl">נביאים</span>, Prophets); and the Ketuvim (<span lang="he" dir="rtl">כתובים</span>, Writings). The Torah holds the highest place and is read in full in the synagogue over the course of each year.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Alongside the written Torah, Jewish teaching recognises an oral Torah, clarified and expanded in the study houses and written down in the Mishnah (<span lang="he" dir="rtl">משנה</span>, "repetition") around 200 CE and in the two Talmuds (<span lang="he" dir="rtl">תלמוד</span>, "study"), completed between the fifth and seventh centuries and composed largely in Aramaic.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"practice-and-the-calendar"} -->
<h2 class="wp-block-heading" id="practice-and-the-calendar">Practice and the calendar</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jewish life is shaped by <em>halakhah</em> (<span lang="he" dir="rtl">הלכה</span>, "the way of walking"), the body of religious law, and by a calendar of sacred time.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><strong>Shabbat</strong> (<span lang="he" dir="rtl">שבת</span>, rest), the weekly day of rest from Friday evening to Saturday evening.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Kashrut</strong> (<span lang="he" dir="rtl">כשרות</span>, fitness), the dietary laws.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Prayer</strong> three times a day, with the Shema at its heart, and the Kaddish (<span lang="arc" dir="rtl">קדיש</span>, "holy"), a prayer largely in Aramaic that closes sections of the service and is recited by mourners.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Festivals</strong> including Passover, Shavuot, Sukkot, Rosh Hashanah, Yom Kippur, Hanukkah and Purim.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Life-cycle rites</strong> including the circumcision of a boy on the eighth day, and the Bar Mitzvah and Bat Mitzvah at the age of responsibility for the commandments.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>The Jewish calendar counts lunar months and keeps pace with the solar year by adding a thirteenth month seven times in each nineteen-year cycle. Days run from sunset to sunset. At morning prayer many observant Jews wear <em>tefillin</em> (<span lang="he" dir="rtl">תפילין</span>, phylacteries), and a <em>mezuzah</em> (<span lang="he" dir="rtl">מזוזה</span>, doorpost) holding passages of the Torah marks the doorways of a Jewish home.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"jewish-life-today"} -->
<h2 class="wp-block-heading" id="jewish-life-today">Jewish life today</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism is a civilisation as much as a religion, carried by communities with distinct languages and customs: Ashkenazi Jews of central and eastern Europe, Sephardi Jews of Spain, Portugal and the lands of their exile, and Mizrahi Jews of the Middle East and North Africa. Religious life today spans Orthodox, Conservative, Reform and Reconstructionist movements, alongside many Jews who hold to the tradition culturally more than religiously.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="judaism" alt="Hebrew inscriptions beside the shrine of the Patriarchs in Hebron" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Continue with <a href="/reference/sacred-texts/">Sacred texts</a>, <a href="/reference/figures/">Figures</a> or the <a href="/reference/glossary/">Glossary</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://www.biblegateway.com/passage/?search=Deuteronomy+6:4&amp;version=NRSVUE">Deuteronomy 6:4</a>. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Jacob Agus, on Judaism, in Ismaʿil Raji al Faruqi, ed., and David E. Sopher, map ed., Historical Atlas of the Religions of the World (New York: Macmillan, 1974), p. 140. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:christianity', 'photo' => array( 'name' => 'page-christianity', 'alt' => 'Christianity on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'christianity', 'title' => 'Christianity', 'parent' => 'page:guides',
			'excerpt' => 'An introduction to Christian origins, scripture, belief and the churches of the world today.', 'description' => 'Christian origins, belief, worship and the churches of the world, explained clearly. Read our introduction to Christianity.', 'menu_order' => 3, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Christianity is the religion centred on the life, teaching, death and resurrection of Jesus of Nazareth, whom Christians confess as the Messiah and the Son of God. With about 2.4 billion adherents, it is the largest religious tradition in the world, and its divisions into Catholic, Orthodox and Protestant churches have shaped much of its history.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#origins">Christianity: origins</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#belief">Belief</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-catholic-church">The Catholic Church</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-orthodox-churches">The Orthodox churches</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-protestant-churches">The Protestant churches</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#worship-and-practice">Worship and practice</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"origins"} -->
<h2 class="wp-block-heading" id="origins">Christianity: origins</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christianity began in the first century CE among Jewish followers of Jesus in Judea and Galilee. The Gospel of Matthew carries two traditions about how far the message was to travel: one confines the twelve to Jewish territory, while the other sends them, after the resurrection, to the ends of the earth.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The account in Acts follows the second, beginning in <a href="/journal/jerusalem-in-three-traditions/">Jerusalem</a> and moving outwards through Samaria. After his crucifixion under the Roman governor Pontius Pilate, his followers proclaimed that God had raised him from the dead. Missionaries, among them the apostle Paul, carried the message across the eastern Mediterranean, and communities of non-Jewish believers soon outnumbered the Jewish ones. The Christian Bible joins the Hebrew scriptures, called the Old Testament, with the <a href="/reference/sacred-texts/bible/">New Testament</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"belief"} -->
<h2 class="wp-block-heading" id="belief">Belief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The early church defined its central doctrines at councils. The Council of Nicaea in 325 and the Council of Constantinople in 381 affirmed the doctrine of the Trinity: one God in three persons, Father, Son and Holy Spirit. The Council of Chalcedon in 451 affirmed that Jesus is one person with a divine and a human nature. These definitions remain the common inheritance of the churches described below, whatever else divides them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-catholic-church"} -->
<h2 class="wp-block-heading" id="the-catholic-church">The Catholic Church</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Catholic Church counts about 1.4 billion members, the largest body of Christians. It traces its ministry to the apostles, with the Bishop of Rome as the successor of Peter. Catholic life turns on seven sacraments: baptism, confirmation, the Eucharist, penance, anointing of the sick, holy orders and matrimony. The Mass stands at the centre of worship, and the saints are honoured as examples and intercessors.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-orthodox-churches"} -->
<h2 class="wp-block-heading" id="the-orthodox-churches">The Orthodox churches</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Eastern Orthodox churches trace their separation from Rome to a long estrangement that hardened in 1054. Each national church governs itself while sharing one faith and liturgy, and together they hold to the practice of the early church with particular care: iconography, chant and a liturgy of great length and antiquity. The Oriental Orthodox churches and the Church of the East separated earlier, over the Christological definitions of the fifth century.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-protestant-churches"} -->
<h2 class="wp-block-heading" id="the-protestant-churches">The Protestant churches</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Protestant movement began in the sixteenth century as a call to reform what its leaders regarded as corruption in the Western church. Two principles shaped it: scripture as the supreme authority, and salvation received through faith. From it came the Lutheran, Reformed, Anglican, Baptist, Methodist and later Pentecostal traditions, which today form the fastest-growing part of Christianity in Africa, Asia and Latin America.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"worship-and-practice"} -->
<h2 class="wp-block-heading" id="worship-and-practice">Worship and practice</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Baptism and the Eucharist, the shared bread and wine that recall the Last Supper, are common to nearly all churches. The great festivals are Christmas and Easter, and the Lord's Prayer, which the Gospels record Jesus teaching his disciples, is said in every tradition.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="christianity" alt="Candles and icons at a Christian shrine" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Continue with <a href="/reference/sacred-texts/">Sacred texts</a>, <a href="/reference/comparisons/">Comparative studies</a> or the <a href="/reference/glossary/">Glossary</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Gerard Sloyan, on Christianity, in Ismaʿil Raji al Faruqi, ed., and David E. Sopher, map ed., Historical Atlas of the Religions of the World (New York: Macmillan, 1974), p. 201; <a href="https://www.biblegateway.com/passage/?search=Matthew+10:5&amp;version=NRSVUE">Matthew 10:5</a>-6; 28:19. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Matthew 6:9-13; Luke 11:2-4. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:islam', 'photo' => array( 'name' => 'page-islam', 'alt' => 'Islam on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'islam', 'title' => 'Islam', 'parent' => 'page:guides',
			'excerpt' => 'An introduction to Islamic history, the Qur’an, the Five Pillars and Muslim communities today.', 'description' => 'The Prophet, the Qur’an, the Five Pillars and Muslim communities today. Read our introduction to Islam.', 'menu_order' => 4, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Islam, (<span lang="ar" dir="rtl">إسلام</span>, "submission" to God), is the religion of Muslims, who hold that God revealed the Qur'an to the Prophet Muhammad in the seventh century CE as the final message in a line of prophets that includes Abraham, Moses and Jesus. Close to two billion people profess it, which makes it the second-largest religion in the world and the fastest-growing.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-meaning-of-the-word">The meaning of the word</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-prophet-and-the-first-community">The Prophet and the first community</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#expansion-and-the-caliphate">Expansion and the caliphate</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#scripture-and-tradition">Scripture and tradition</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#islam-among-the-religions">Islam among the religions</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-five-pillars">The five pillars</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#prophets-before-muhammad">Prophets before Muhammad</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-meaning-of-the-word"} -->
<h2 class="wp-block-heading" id="the-meaning-of-the-word">The meaning of the word</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Arabic word carries more than its usual English renderings of submission or surrender suggest. It names a commitment made to God without reservation, joining trust, obedience and peace in a single term. The <a href="/reference/sacred-texts/quran/">Qur'an</a> speaks of the religion of <a href="/journal/who-was-abraham/">Abraham</a>, and Muslims understand Islam as the restoration of that original monotheism, given again through a final messenger.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-prophet-and-the-first-community"} -->
<h2 class="wp-block-heading" id="the-prophet-and-the-first-community">The Prophet and the first community</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muhammad was born in <a href="/reference/places/#makkah">Makkah</a> (Mecca) around 570 CE. Muslims hold that revelation began around 610, when he was about forty, and continued for some twenty-three years. Makkah at that time was governed by a balance between clans, with four months of each year set aside in which no hostility was tolerated and the caravan routes were safe.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>At the centre of the city stood the sanctuary, holding the Kaaba, which Muslim tradition holds Abraham and <a href="/reference/figures/#ishmael">Ishmael</a> built for the worship of the one God, and which by then housed some three hundred idols.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> His preaching of one God met resistance in that city, and in 622 he and his followers migrated to Madinah (Medina), an event called the <em>hijrah</em> (<span lang="ar" dir="rtl">هجرة</span>, migration), which begins the Islamic calendar. By his death in 632, most of the tribes of Arabia had accepted Islam.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"expansion-and-the-caliphate"} -->
<h2 class="wp-block-heading" id="expansion-and-the-caliphate">Expansion and the caliphate</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>After the Prophet's death the community chose Abu Bakr as caliph. Under his successors, and then the Umayyad and Abbasid dynasties, Muslim rule reached from Spain to Central Asia within a century. Baghdad under the Abbasids became a centre of learning where Greek, Persian and Indian works were translated and extended. Islam reached West Africa through trade and teaching from the tenth century, and the Malay archipelago from the thirteenth, where Indonesia now holds the largest Muslim population of any country.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<!-- wp:heading {"anchor":"scripture-and-tradition"} -->
<h2 class="wp-block-heading" id="scripture-and-tradition">Scripture and tradition</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur'an (<span lang="ar" dir="rtl">قرآن</span>, "recitation") contains 114 chapters. Muslims regard it as the literal speech of God in Arabic, preserved in writing and in the memory of reciters in every generation. Alongside it stands the <em>sunnah</em> (<span lang="ar" dir="rtl">سنة</span>, "custom"), the example of the Prophet, known through reports called <em>ḥadīth</em> (<span lang="ar" dir="rtl">حديث</span>, "report"). From these sources scholars developed Qur'anic exegesis and <em>fiqh</em> (<span lang="ar" dir="rtl">فقه</span>, "understanding"), the jurisprudence expressed in the Hanafi, Maliki, Shafi'i and Hanbali schools.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"islam-among-the-religions"} -->
<h2 class="wp-block-heading" id="islam-among-the-religions">Islam among the religions</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Asked about its own origins, Islam names as its predecessor the way of the <em>ḥunafāʾ</em> (<span lang="ar" dir="rtl">حنفاء</span>, those who turned to God alone), and the Qur'an identifies the two.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Parallels with Jewish and Christian teaching are numerous, and on this account they establish neither borrowing nor descent: both religions were known in Arabia and treated as foreign, while the <em>ḥanīf</em> was an Arab among Arabs.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Muslim thought has a settled account of where the other religions stand. True religion, on this reading, is what acknowledges God as Lord and Creator and directs a person to a life of moral worth; it is natural to human beings, freely held, and no burden to carry.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Qur'an describes it as the pattern on which God made humankind, and calls the one who turns to it <em>ḥanīf</em> (<span lang="ar" dir="rtl">حنيف</span>, pure monotheist).<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Reason alone can reach that religion, and God has nevertheless sent prophets to every people, because people forget and fall away, which makes the message necessary again and again. The core of each revelation was one and the same, while the law attached to it developed with the times. On this account <a href="/religions/judaism/">Judaism</a> and <a href="/religions/christianity/">Christianity</a> began as divine religions and later departed from what had been given them, which is why the message required restating.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Muslim writers place Muhammad at the close of that sequence. The Qur'an describes him as a man like other men, without supernatural power, unable to save or to condemn, or even to intercede at will, since all power belongs to God. The miracle, in this account, lies in the content of what was revealed and not in any transformation of the man who carried it.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-five-pillars"} -->
<h2 class="wp-block-heading" id="the-five-pillars">The five pillars</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><em>Shahādah</em> (<span lang="ar" dir="rtl">شهادة</span>, testimony): the declaration that there is no god but God and that Muhammad is God's messenger.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><em>Ṣalāh</em> (<span lang="ar" dir="rtl">صلاة</span>, ritual prayer): prayer five times a day, facing Makkah.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><em>Zakāh</em> (<span lang="ar" dir="rtl">زكاة</span>, purifying alms): an annual payment to those in need.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><em>Ṣawm</em> (<span lang="ar" dir="rtl">صوم</span>, fasting): the fast of the month of Ramadan.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><em>Ḥajj</em> (<span lang="ar" dir="rtl">حج</span>, pilgrimage): the pilgrimage to Makkah, once in a lifetime for those able.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"prophets-before-muhammad"} -->
<h2 class="wp-block-heading" id="prophets-before-muhammad">Prophets before Muhammad</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur'an teaches that God has sent messengers to every people, and it names many figures known from the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a> and the Gospels, among them Abraham, <a href="/reference/figures/#moses">Moses</a>, David, Solomon and Jesus. Muslims therefore describe those who submitted to God before Muhammad as Muslims in the root sense of the word, and recognise a particular kinship with Jews and Christians as heirs of Abraham.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="islam" alt="Pilgrims at the Station of Abraham in the Great Mosque of Makkah" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Continue with <a href="/reference/sacred-texts/">Sacred texts</a>, <a href="/reference/places/">Places</a> or the <a href="/reference/glossary/">Glossary</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Ismaʿil Raji al Faruqi, ed., and David E. Sopher, map ed., Historical Atlas of the Religions of the World (New York: Macmillan, 1974), p. 240. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Ibid., p. 237. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ibid. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ismaʿil Raji al Faruqi, in Wing-tsit Chan, Ismaʿil Raji al Faruqi, Joseph M. Kitagawa and P. T. Raju, comps., The Great Asian Religions: An Anthology (New York: Macmillan, 1969), p. 323. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5"><a href="https://quran.com/30/30">Qur'an 30:30</a>; 4:125. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">The Great Asian Religions, p. 323. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibid., p. 332. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Qur'an 2:136; 29:46. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:sacred-texts', 'photo' => array( 'name' => 'page-sacred-texts', 'alt' => 'Sacred texts on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'sacred-texts', 'title' => 'Sacred texts', 'parent' => 'page:knowledge-base',
			'excerpt' => 'The scriptures of Judaism, Mandaeism, Christianity and Islam, how they were compiled, and how each tradition reads them.', 'description' => 'The Hebrew Bible, the Christian Bible and the Qur’an: how each was compiled and read. Explore the sacred texts.', 'menu_order' => 5, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The sacred texts of the four traditions are the subject of this section. Each Abrahamic tradition is anchored in scripture, and each surrounds its scripture with a tradition of interpretation. What follows are the principal texts of each, and how they took shape.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-hebrew-bible">Sacred texts: the Hebrew Bible</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#rabbinic-literature">Rabbinic literature</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#aramaic-in-the-scriptures">Aramaic in the scriptures</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-mandaean-scriptures">The Mandaean scriptures</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-christian-bible">The Christian Bible</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-qur-an-and-hadith">The Qur'an and ḥadīth</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#reading-scripture">Reading scripture</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="isaiah-scroll" alt="Hebrew columns of the Great Isaiah Scroll from Qumran, copied in the second century BCE" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-hebrew-bible"} -->
<h2 class="wp-block-heading" id="the-hebrew-bible">Sacred texts: the Hebrew Bible</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Tanakh takes its name from its three divisions: Torah, Nevi'im and Ketuvim. Jewish tradition counts twenty-four books. The Torah, the five books from Genesis to Deuteronomy, holds the highest place and is read in full in the synagogue over the course of each year. The oldest surviving Hebrew manuscripts of biblical books are among the Dead Sea Scrolls, found near Qumran from 1947 onwards and dating from roughly the third century BCE to the first century CE.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"rabbinic-literature"} -->
<h2 class="wp-block-heading" id="rabbinic-literature">Rabbinic literature</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Mishnah, edited around 200 CE, organises Jewish law by subject. The Talmud joins the Mishnah to the Gemara, a wide-ranging commentary; its Jerusalem and Babylonian versions were completed between the fifth and seventh centuries. Midrash collects rabbinic interpretation of scripture.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Each of the three scriptures has a page of its own, listing what it contains: <a href="/reference/sacred-texts/tanakh/">the Tanakh</a>, <a href="/reference/sacred-texts/bible/">the Christian Bible</a> and <a href="/reference/sacred-texts/quran/">the Qur'an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"aramaic-in-the-scriptures"} -->
<h2 class="wp-block-heading" id="aramaic-in-the-scriptures">Aramaic in the scriptures</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Aramaic, a Semitic language closely related to Hebrew, served as a common language across much of the Near East from the Persian period onwards. Papyri from the Jewish community at Elephantine in Egypt, written in the Imperial Aramaic script, survive from the fifth century BCE. Parts of the books of Daniel and Ezra are written in Aramaic, in the same square script as the Hebrew around them. The Targums (<span lang="arc" dir="rtl">תרגום</span>, "translation"), Aramaic renderings of the Hebrew scriptures, were read in synagogues, and the Gemara of the Babylonian Talmud is written largely in Jewish Babylonian Aramaic.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Most historians hold that Jesus taught in Aramaic, and the Gospels preserve a few of his Aramaic words, such as <em>abba</em> (<span lang="arc" dir="rtl">אבא</span>, father). Syriac, a dialect of Aramaic with its own alphabet, carries the Peshitta (<span lang="syc" dir="rtl">ܦܫܝܛܬܐ</span>, "the simple version"), the standard Bible of the Syriac churches, and a large body of Christian literature.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-mandaean-scriptures"} -->
<h2 class="wp-block-heading" id="the-mandaean-scriptures">The Mandaean scriptures</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Mandaeans keep their scriptures in Mandaic, an eastern dialect of Aramaic with its own script. The largest is the <em>Ginza Rabba</em> (the Great Treasure), bound in two halves: the Right Ginza on theology, creation and history, and the Left Ginza on the ascent of the soul after death. Beside it stand the <em>Qolasta</em> (the Collection), the prayer book used in baptism and the rites for the dead, and the <em>Drasha d-Yahya</em> (the Book of John), which gathers the teachings of <a href="/journal/john-the-baptist/">John the Baptist</a>. The community keeps its own history in a scroll, the <em>Haran Gawaita</em>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Copying the scriptures is reserved to the priests, and the more esoteric scrolls are handed on at ordination and withheld from laypeople. The colophons, in which each copyist names the scribes before him, allow the chain of transmission to be traced back many centuries. The <a href="/religions/mandaeism/#scripture">Mandaeism</a> page lists the books in more detail.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-christian-bible"} -->
<h2 class="wp-block-heading" id="the-christian-bible">The Christian Bible</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Christian Old Testament contains the books of the Hebrew Bible, arranged differently. The Catholic and Orthodox churches also accept further books preserved in the Greek translation known as the Septuagint, called deuterocanonical books. The New Testament has twenty-seven books: the four Gospels, the Acts of the Apostles, twenty-one letters and the book of Revelation. Protestant Bibles contain sixty-six books, Catholic Bibles seventy-three, and Orthodox Bibles a few more.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-qur-an-and-hadith"} -->
<h2 class="wp-block-heading" id="the-qur-an-and-hadith">The Qur'an and ḥadīth</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur'an has 114 <em>sūrahs</em> (<span lang="ar" dir="rtl">سورة</span>, chapters), arranged broadly from longest to shortest. Muslim tradition holds that it was revealed over some twenty-three years, memorised and written down in the Prophet's lifetime, and gathered into a standard written text under the third caliph, ʿUthmān, around 650 CE.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Muslim theology locates the miracle of the revelation in what was said and not in any power granted to the man who received it, a point that shapes both how the text is read and the weight given to its wording.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Alongside the written text, the Qur'an has been carried by memory: a Muslim who has memorised all of it is called a <em>ḥāfiẓ</em> (<span lang="ar" dir="rtl">حافظ</span>, "one who preserves"), and such reciters are found in Muslim communities worldwide. The ḥadīth literature records the words and deeds of the Prophet; Sunni Muslims give special weight to the collections compiled by al-Bukhārī and Muslim ibn al-Ḥajjāj.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"reading-scripture"} -->
<h2 class="wp-block-heading" id="reading-scripture">Reading scripture</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All four traditions read scripture through commentary. Jewish readers turn to the Talmud and the medieval commentators; Christian readers to the church fathers and later theologians; Muslim readers to <em>tafsīr</em> (<span lang="ar" dir="rtl">تفسير</span>, exegesis); Mandaean priests to the ritual commentaries their order transmits. Modern historical scholarship adds its own questions about authorship, dating and context. See <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur'an in Historical Context</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Ismaʿil Raji al Faruqi, in Wing-tsit Chan, Ismaʿil Raji al Faruqi, Joseph M. Kitagawa and P. T. Raju, comps., The Great Asian Religions: An Anthology (New York: Macmillan, 1969), p. 332. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://quran.com/">The Qur’an (Quran.com)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:figures', 'photo' => array( 'name' => 'page-figures', 'alt' => 'Figures on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'figures', 'title' => 'Figures', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Biographical and theological overviews of the people who shaped the Abrahamic traditions.', 'description' => 'Abraham, Moses, Mary, Jesus, Muhammad and others as each tradition remembers them. Meet the key figures.', 'menu_order' => 6, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Many figures appear in more than one Abrahamic scripture, often with different emphases. The overviews below note how each tradition remembers them.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#adam">Figures: adam</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#seth">Seth</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#noah">Noah</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#abraham">Abraham</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#sarah">Sarah</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#hagar">Hagar</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#isaac">Isaac</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#ishmael">Ishmael</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#jacob">Jacob</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#joseph">Joseph</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#moses">Moses</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#david">David</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#solomon">Solomon</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mary">Mary</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#john-the-baptist">John the Baptist</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#jesus">Jesus</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#muhammad">Muhammad</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"adam"} -->
<h2 class="wp-block-heading" id="adam">Figures: adam</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The first human being in all four traditions. Genesis tells of his creation and his expulsion from the garden; Christian theology reads his disobedience as the origin of sin. The <a href="/reference/sacred-texts/quran/">Qur'an</a> names Ādam the first prophet and the one to whom God taught the names of all things. Mandaean teaching holds that the first revelation was given to Adam, and it speaks of Adam Kasia, the hidden Adam, the heavenly counterpart of every human soul.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"seth"} -->
<h2 class="wp-block-heading" id="seth">Seth</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The third son of Adam and Eve, born after the death of Abel. Jewish and Christian tradition trace the line of the righteous through him, and Muslim tradition counts Shīth among the early prophets. For Mandaeans he is Shitil, the purest of human souls: after death each soul is weighed in the scales of Abathur against the soul of Shitil.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"noah"} -->
<h2 class="wp-block-heading" id="noah">Noah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The righteous man saved with his family from the flood. The <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a> makes him the bearer of a covenant with all humankind; the <a href="/reference/sacred-texts/bible/">New Testament</a> calls him a preacher of righteousness; the Qur'an gives a sūrah his name, <em>Nūḥ</em>, and presents him as a messenger rejected by his people. Mandaean tradition keeps Noah and his son Shem in its line of prophets, and among the prayers the priests recite at the ritual meal is one that bears the name of Shem son of Noah.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"abraham"} -->
<h2 class="wp-block-heading" id="abraham">Abraham</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The patriarch whose call and covenant begin the story of Israel in the Hebrew Bible. Christians honour him as a model of faith; Muslims revere Ibrāhīm as a prophet, a <em>ḥanīf</em> (<span lang="ar" dir="rtl">حنيف</span>, pure monotheist) and the friend of God, and the Qur'an commands Muhammad to follow his path.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Mandaean teaching does not count him among the prophets, and some of its texts describe him as a former priest of the community who broke away from it.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"sarah"} -->
<h2 class="wp-block-heading" id="sarah">Sarah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="/journal/who-was-abraham/">Abraham</a>'s wife and the mother of Isaac. The Hebrew Bible counts her among the matriarchs of Israel; the Qur'an alludes to her when angels bring the news of Isaac's birth.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"hagar"} -->
<h2 class="wp-block-heading" id="hagar">Hagar</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sarah's servant and the mother of Ishmael. Her search for water in the desert is commemorated in the <em>saʿy</em> (<span lang="ar" dir="rtl">سعي</span>, ritual walk) of the Muslim pilgrimage.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"isaac"} -->
<h2 class="wp-block-heading" id="isaac">Isaac</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abraham's son with Sarah and the father of Jacob. Jewish tradition remembers the near-sacrifice of Isaac, the <em>Akedah</em>; the Qur'an names Isḥāq as a prophet.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ishmael"} -->
<h2 class="wp-block-heading" id="ishmael">Ishmael</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abraham's son with Hagar. Islamic tradition regards Ismāʿīl as a prophet who, with his father, raised the foundations of the Kaaba, and as an ancestor of the northern Arab tribes.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"jacob"} -->
<h2 class="wp-block-heading" id="jacob">Jacob</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Isaac's son, renamed Israel, and the father of the twelve tribes. The Qur'an names Yaʿqūb among the prophets.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"joseph"} -->
<h2 class="wp-block-heading" id="joseph">Joseph</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jacob's son, sold into slavery and raised to high office in Egypt. His story fills the last chapters of Genesis and a complete sūrah of the Qur'an. The Qur'an calls the ruler he served <em>al-malik</em> (<span lang="ar" dir="rtl">الملك</span>, the king) and keeps the title <em>Firʿawn</em> (<span lang="ar" dir="rtl">فرعون</span>, Pharaoh) for the ruler of Moses' day, a distinction that matches the Egyptian record.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> See <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"moses"} -->
<h2 class="wp-block-heading" id="moses">Moses</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The prophet who led the Israelites out of Egypt and received the Torah at Sinai. Mūsā is the prophet named most often in the Qur'an. Mandaean teaching does not accept him as a prophet.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-sinai" alt="The peaks of Mount Sinai, where Jewish, Christian and Muslim tradition places the revelation to Moses" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"david"} -->
<h2 class="wp-block-heading" id="david">David</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The shepherd who became king of Israel and, by tradition, the author of many psalms. Muslims honour Dāwūd as a prophet who received the <em>Zabūr</em> (<span lang="ar" dir="rtl">زبور</span>, the Psalms).</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"solomon"} -->
<h2 class="wp-block-heading" id="solomon">Solomon</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>David's son, remembered for his wisdom and for building the First Temple. In the Qur'an, Sulaymān is a prophet-king granted command over the wind and the jinn.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mary"} -->
<h2 class="wp-block-heading" id="mary">Mary</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The mother of Jesus. Christians honour her as the mother of God's Son; Maryam is the only woman the Qur'an mentions by name, and a sūrah bears her name. See <a href="/journal/mary-across-the-traditions/">Mary across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"john-the-baptist"} -->
<h2 class="wp-block-heading" id="john-the-baptist">John the Baptist</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A preacher of repentance who baptised in the Jordan. The Gospels present him as the forerunner of Jesus; the Qur'an names him Yaḥyā and calls him confirmed in wisdom; Mandaeans hold him to be the greatest and the last of the prophets, and their rites of baptism look back to him.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="jordan-river" alt="The Jordan River at Qasr al-Yahud, the traditional site of the baptisms performed by John" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"jesus"} -->
<h2 class="wp-block-heading" id="jesus">Jesus</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>For Christians, Jesus of Nazareth is the Messiah, the Son of God, crucified and raised from the dead. Muslims honour ʿĪsā as the Messiah and one of the greatest prophets, born of the Virgin Mary, and do not regard him as divine. Jewish tradition does not accept him as the Messiah. Mandaean texts remember him as a pupil of John who altered what John had taught. See <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"muhammad"} -->
<h2 class="wp-block-heading" id="muhammad">Muhammad</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Prophet of <a href="/religions/islam/">Islam</a>, born in <a href="/reference/places/#makkah">Makkah</a> (Mecca) around 570 CE. Muslims regard him as the final messenger of God, through whom the Qur'an was revealed. Mandaeans do not accept him as a prophet; under Muslim rule their community was recognised as the Sabians whom the Qur'an names beside the Jews and the Christians.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), pp. 197-199. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Ibid., p. 163. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3"><a href="https://quran.com/16/123">Qur'an 16:123</a>. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur'an 12:43, 12:50, 12:54, 12:72, 12:76; 7:104; 10:75. On the Egyptian usage, I. Shaw and P. Nicholson, British Museum Dictionary of Ancient Egypt (London: British Museum Press, 1995), p. 222. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:places', 'photo' => array( 'name' => 'page-places', 'alt' => 'Places on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'places', 'title' => 'Places', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Sacred sites and historical landscapes of the Abrahamic traditions.', 'description' => 'Places holy to the Abrahamic faiths: Jerusalem, Hebron, Makkah, Madinah, Sinai and more. Discover the sacred sites.', 'menu_order' => 7, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Certain places carry meaning for more than one tradition, and several have been contested for centuries. The sites below are those the four traditions hold most sacred, from the Temple Mount in Jerusalem to the rivers where the Mandaeans baptise.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#jerusalem">Places: jerusalem</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#hebron">Hebron</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#bethlehem">Bethlehem</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#nazareth">Nazareth</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mount-sinai">Mount Sinai</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-jordan-river">The Jordan River</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#makkah">Makkah</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#madinah">Madinah</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#vatican-city">Vatican City</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#ahvaz-and-the-karun">Ahvaz and the Karun</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"jerusalem"} -->
<h2 class="wp-block-heading" id="jerusalem">Places: jerusalem</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sacred to Judaism, Christianity and Islam. For Jews it is the city of the Temple, whose Western Wall remains a place of prayer. For Christians it is where Jesus was crucified and, they believe, rose from the dead; the Church of the Holy Sepulchre marks the site. For Muslims it holds al-Masjid al-Aqṣā (<span lang="ar" dir="rtl">المسجد الأقصى</span>, the Farthest Mosque) and the Dome of the Rock, associated with the Prophet’s Night Journey, and it was the first direction of Muslim prayer before the qiblah turned to Makkah.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> See <a href="/journal/jerusalem-in-three-traditions/">Jerusalem in three traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="jerusalem-panorama" alt="The Old City of Jerusalem from the Mount of Olives, with the Dome of the Rock above the walls" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"hebron"} -->
<h2 class="wp-block-heading" id="hebron">Hebron</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Genesis tells how Abraham bought the cave of Machpelah at Hebron to bury Sarah, and it became the family tomb of the patriarchs.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The cave lies within massive walls built in the first century to protect the tombs of Abraham and his family, and the site became a place of pilgrimage for Jews, Christians and Muslims alike; Muslims know it as al-Ḥaram al-Ibrāhīmī, the Sanctuary of Abraham. The old town around it was rebuilt in local limestone under the Mamluks between 1250 and 1517, and UNESCO inscribed it as a World Heritage site in 2017.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> The city’s Arabic name, al-Khalīl, is Abraham’s own title in Islam: the Friend of God.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-hebron" alt="The cenotaph of Abraham inside the Sanctuary of Abraham at Hebron" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"bethlehem"} -->
<h2 class="wp-block-heading" id="bethlehem">Bethlehem</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ten kilometres south of Jerusalem, Bethlehem is the town of David’s family in the Hebrew Bible and, in the Gospels, the birthplace of Jesus.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Christian tradition has placed the birth in a cave there since at least the second century. The first Church of the Nativity was completed over it in 339; the church that replaced it after a fire in the sixth century still keeps floor mosaics from the first, and Latin, Greek Orthodox, Franciscan and Armenian convents stand around it.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The Qur’an tells the birth without naming the town: Mary withdrew to a remote place and gave birth beneath a palm tree.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="places-bethlehem" alt="The stone walls and bell tower of the Church of the Nativity in Bethlehem" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"nazareth"} -->
<h2 class="wp-block-heading" id="nazareth">Nazareth</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Nazareth in Galilee is the town where Jesus grew up and where, in Luke’s Gospel, the angel Gabriel announced his birth to Mary.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> The Qur’an tells the same annunciation: the angels gave Mary good tidings of a word from God, whose name would be the Messiah, Jesus son of Mary.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> The present Basilica of the Annunciation, designed by Giovanni Muzio and consecrated in 1969, stands on two levels: the upper church follows the outline of the Crusader cathedral, and the lower one enshrines the grotto venerated since Byzantine times. On its completion it was the largest Christian sanctuary in the Middle East.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="places-nazareth" alt="The striped stone walls of the Basilica of the Annunciation in Nazareth" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mount-sinai"} -->
<h2 class="wp-block-heading" id="mount-sinai">Mount Sinai</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The mountain where, according to the Hebrew Bible, <a href="/reference/figures/#moses">Moses</a> received the law.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup> The Qur’an swears by Mount Sinai and tells how God called Moses in the sacred valley of Ṭuwā.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup> Tradition identifies the mountain with Jebel Musa in the south of the Sinai Peninsula, though scholars have proposed other locations. At its foot stands the Greek Orthodox Monastery of Saint Catherine, founded in the sixth century and the oldest Christian monastery still used for its original purpose; the whole area, UNESCO notes, is sacred to Judaism, Christianity and Islam.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="places-sinai" alt="The Monastery of Saint Catherine beneath the mountains of southern Sinai" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-jordan-river"} -->
<h2 class="wp-block-heading" id="the-jordan-river">The Jordan River</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In the Hebrew Bible the Israelites cross the Jordan to enter the land promised to Abraham; in the Gospels John baptises in its waters, and Jesus comes to him to be baptised.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The site venerated as the place of that baptism, Bethany beyond the Jordan (al-Maghṭas), lies on the east bank north of the Dead Sea; its remains include pools, churches, a monastery and hermits’ caves, and it became a World Heritage site in 2015.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> In Islamic history the Jordan valley holds the shrines of several Companions of the Prophet, among them Abū ʿUbaydah ibn al-Jarrāḥ. Mandaeans call the running water of their baptisms <em>yardna</em>, a word most scholars take from the Jordan, although E. S. Drower doubted the connection.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="places-jordan" alt="The Church of Saint John the Baptist at the baptism site on the east bank of the Jordan" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"makkah"} -->
<h2 class="wp-block-heading" id="makkah">Makkah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Written Mecca in most English sources, Makkah is the birthplace of Muhammad and the holiest city in <a href="/religions/islam/">Islam</a>. The Qur’an calls its sanctuary the first House of worship established for mankind, at Bakkah, and recounts how Abraham and <a href="/reference/figures/#ishmael">Ishmael</a> raised its foundations.<sup class="abr-fn"><a href="#note-16" id="ref-16">16</a></sup> At its centre stands the Kaaba, toward which Muslims everywhere turn in prayer,<sup class="abr-fn"><a href="#note-17" id="ref-17">17</a></sup> and the Great Mosque around it receives the pilgrims of the Hajj, who go out from the city to Minā, ʿArafāt and Muzdalifah. See <a href="/journal/the-stations-of-the-hajj/">The stations of the Hajj</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="places-makkah" alt="The Great Mosque of Makkah and the Kaaba seen from above at sunset" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"madinah"} -->
<h2 class="wp-block-heading" id="madinah">Madinah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Written Medina in most English sources, Madinah was the oasis town of Yathrib, the name by which the Qur’an still knows it.<sup class="abr-fn"><a href="#note-18" id="ref-18">18</a></sup> In 622 the Prophet left Makkah for Yathrib, sheltering on the way in a cave with his companion Abū Bakr,<sup class="abr-fn"><a href="#note-19" id="ref-19">19</a></sup> and the city became the home of the first Muslim community and the capital of the Islamic state until 661. The Prophet is buried in his mosque there, which makes Madinah the second holiest city in Islam; many pilgrims visit it together with the Hajj.<sup class="abr-fn"><a href="#note-20" id="ref-20">20</a></sup> Its full name, al-Madīnah al-Munawwarah (<span lang="ar" dir="rtl">ٱلْمَدِينَة ٱلْمُنَوَّرَة</span>, the Radiant City), honours him. On its southern edge stands Qubāʾ, the first mosque of Islam; see <a href="/journal/hira-and-quba/">Ḥirāʾ and Qubāʾ</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="places-madinah" alt="The great shade umbrellas in the courtyards of the Prophet’s Mosque in Madinah" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"vatican-city"} -->
<h2 class="wp-block-heading" id="vatican-city">Vatican City</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The smallest state in the world, forty-four hectares within Rome defined by the Lateran Treaty of 1929, Vatican City is the seat of the Pope and the holiest city of Catholic Christianity. Its centre is St Peter’s Basilica, raised over the tomb of the apostle Peter, whom Catholics count the first bishop of Rome. Constantine founded the first basilica there in the fourth century; beneath the present church, rebuilt from 1506 by Bramante, Michelangelo, Maderno and Bernini, lie remains of that basilica and the first-century necropolis where Peter’s tomb is located. The whole state has been a World Heritage site since 1984.<sup class="abr-fn"><a href="#note-21" id="ref-21">21</a></sup> See <a href="/journal/the-five-great-sees/">The five great sees of the early church</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="places-vatican" alt="The dome of St Peter’s Basilica rising above the Tiber in Rome" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ahvaz-and-the-karun"} -->
<h2 class="wp-block-heading" id="ahvaz-and-the-karun">Ahvaz and the Karun</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeism has no single holy city: its sacred places are its rivers, where every baptism must be performed in running water. Its communities have lived for centuries in the marshes and river towns of southern Iraq, and across the border in the Iranian province of Khuzestan, where E. S. Drower recorded settlements at Muhammerah and at Ahvaz on the banks of the Karun.<sup class="abr-fn"><a href="#note-22" id="ref-22">22</a></sup> Ahvaz is still the centre of the Mandaean community in Iran: its <em>mandi</em>, the community house, stands in the Mandaean quarter of the city, and its Sunday baptisms take place in the open along the Karun.<sup class="abr-fn"><a href="#note-23" id="ref-23">23</a></sup> See <a href="/religions/mandaeism/">Mandaeism</a> and <a href="/journal/masbuta-baptism-in-running-water/">Maṣbūtā: baptism in running water</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="places-ahvaz" alt="The White Bridge over the Karun River at Ahvaz by night" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/17/1">Qur’an 17:1</a>; 2:144. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Genesis 23:1-20; 49:29-32. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">UNESCO World Heritage Centre, “Hebron/Al-Khalil Old Town,” World Heritage List no. 1565. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">1 Samuel 16:1-13; Matthew 2:1; Luke 2:4-7. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">UNESCO World Heritage Centre, “Birthplace of Jesus: Church of the Nativity and the Pilgrimage Route, Bethlehem,” World Heritage List no. 1433. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Qur’an 19:22-26. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Luke 1:26-38; 2:39-40. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Qur’an 3:45-47; 19:16-21. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">“Christian Holy Sites: The Basilica of the Annunciation,” Jewish Virtual Library, after the Israeli Ministry of Foreign Affairs. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Exodus 19:16-20:17. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Qur’an 95:2; 20:11-14. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">UNESCO World Heritage Centre, “Saint Catherine Area,” World Heritage List no. 954. <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Joshua 3:14-17; Matthew 3:13-17. <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">UNESCO World Heritage Centre, “Baptism Site “Bethany Beyond the Jordan” (Al-Maghtas),” World Heritage List no. 1446. <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-15">Eric Segelberg, <em>Maṣbūtā: Studies in the Ritual of the Mandaean Baptism</em> (Uppsala: Almqvist &amp; Wiksells, 1958), p. 38 and n. 2. <a href="#ref-15" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-16">Qur’an 3:96; 2:127. <a href="#ref-16" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-17">Qur’an 2:144. <a href="#ref-17" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-18">Qur’an 33:13. <a href="#ref-18" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-19">Qur’an 9:40. <a href="#ref-19" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-20">“Medina,” <em>Encyclopaedia Britannica</em>. <a href="#ref-20" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-21">UNESCO World Heritage Centre, “Vatican City,” World Heritage List no. 286. <a href="#ref-21" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-22">E. S. Drower, <em>The Mandaeans of Iraq and Iran</em> (Oxford: Clarendon Press, 1937), pp. 1-2. <a href="#ref-22" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-23">“Mandaeans (4): Community in Iran,” <em>Encyclopaedia Iranica</em>. <a href="#ref-23" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:glossary', 'photo' => array( 'name' => 'page-glossary', 'alt' => 'The glossary on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'glossary', 'title' => 'Glossary', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Key terms from Judaism, Mandaeism, Christianity and Islam, defined in plain language.', 'description' => 'A glossary of terms from Judaism, Mandaeism, Christianity and Islam, explained in plain language. Look a term up.', 'menu_order' => 8, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>This glossary explains the terms used across the site. Brief definitions of terms used throughout. Arabic and Hebrew terms are given in transliteration.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"terms"} -->
<h2 class="wp-block-heading" id="terms">The glossary: terms</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><strong>Abrahamic religions</strong>: traditions that trace a spiritual or historical link to Abraham: <a href="/religions/judaism/">Judaism</a>, Mandaeism, <a href="/religions/christianity/">Christianity</a> and Islam, of which Mandaeism is by far the smallest. The phrase itself dates from the middle of the twentieth century.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Abrahamism</strong>: an informal name, used mostly online and in some languages other than English, for the <a href="/reference/faq/#what-is-abrahamism">Abrahamic religions</a> taken together, or for the belief they share that God made himself known to Abraham.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Apocrypha</strong>: books found in the Greek Old Testament but outside the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a>; Catholic and Orthodox churches call most of them deuterocanonical.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Aramaic</strong>: a Semitic language related to Hebrew, used in parts of Daniel and Ezra, the Talmud and the Targums, and, as Syriac, by several Eastern churches.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>BCE and CE</strong>: Before the Common Era and Common Era, the dating labels used throughout.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Canon</strong>: the list of books a community accepts as scripture.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Covenant</strong>: a binding relationship between God and people, central to the Hebrew Bible.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Creed</strong>: a formal statement of Christian belief, such as the Nicene Creed.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Darfash</strong>: the Mandaean banner of olive wood and white silk, the emblem of the community.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Eucharist</strong>: the Christian rite of bread and wine, also called Holy Communion or the Mass.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Fiqh</strong>: Islamic jurisprudence, the human understanding of divine law.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Ganzibra</strong>: in <a href="/religions/mandaeism/">Mandaeism</a>, a head priest, raised from the rank of <em>tarmida</em>, who may consecrate new priests.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Gemara</strong>: the rabbinic commentary on the Mishnah, written largely in Aramaic; with the Mishnah it forms the Talmud.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Ginza Rabba</strong>: the principal scripture of Mandaeism, in Mandaic.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Gospel</strong>: "good news"; also each of the four accounts of Jesus' life in the <a href="/reference/sacred-texts/bible/">New Testament</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Ḥadīth</strong>: a report of the words or deeds of the Prophet Muhammad.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Ḥajj</strong>: the pilgrimage to <a href="/reference/places/#makkah">Makkah</a>, one of the Five Pillars of <a href="/religions/islam/">Islam</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Halakhah</strong>: Jewish religious law.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Ḥanīf</strong>: in the <a href="/reference/sacred-texts/quran/">Qur'an</a>, a pure monotheist, a title given to <a href="/journal/who-was-abraham/">Abraham</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Hayyi Rabbi</strong>: 'the Great Life', the Mandaean name for God, source of the World of Light.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Hijrah</strong>: the Prophet's migration from Makkah to Madinah in 622 CE.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Imam</strong>: a leader of congregational prayer.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Kaaba</strong>: the cube-shaped shrine at the centre of the Great Mosque in Makkah.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Kashrut</strong>: the Jewish dietary laws.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Makkah</strong>: the holiest city in Islam, written Mecca in most English sources. The site follows the transliteration of the Arabic.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Mandaeism</strong>: the Gnostic religion of the Mandaeans of Iraq and Iran, whose greatest prophet is <a href="/journal/john-the-baptist/">John the Baptist</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Mandaic</strong>: the eastern Aramaic dialect of the Mandaean scriptures and liturgy, written in its own script.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Mandi</strong>: the Mandaean sacred enclosure, holding the baptismal pool and the cult hut where the priests perform the rites.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Masbuta</strong>: Mandaean baptism in flowing water, repeated throughout life.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Messiah</strong>: "anointed one"; a figure of Jewish hope, identified by Christians and Muslims with Jesus.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Midrash</strong>: rabbinic interpretation of scripture.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Millat Ibrāhīm</strong>: 'the <a href="/journal/millat-ibrahim/">path of Abraham</a>', the Qur'an's name for the monotheism of Abraham, which it calls its hearers to follow and which Muslims hold Islam restores.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Mishnah</strong>: the first written compilation of Jewish oral law, around 200 CE.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Nasoraeans</strong>: the name Mandaeans use for those initiated into the knowledge the Mandaean priesthood transmits.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Patriarchs</strong>: Abraham, Isaac and Jacob.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Peshitta</strong>: the standard Syriac translation of the Bible.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Qiblah</strong>: the direction of the Kaaba in Makkah, which Muslims face in prayer.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Rabbi</strong>: a Jewish teacher and interpreter of the law.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Sabians</strong>: a community named three times in the Qur'an beside Jews and Christians; identified since the seventh century with the Mandaeans.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Ṣalāh</strong>: the five daily ritual prayers of Islam.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Septuagint</strong>: the ancient Greek translation of the Hebrew scriptures.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Shabbat</strong>: the Jewish day of rest, from Friday evening to Saturday evening.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Shahādah</strong>: the Muslim declaration of faith.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Shema</strong>: the Jewish declaration of God's oneness, recited morning and evening.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Shirk</strong>: in Islam, associating partners with God, the gravest sin.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Sunnah</strong>: the example of the Prophet Muhammad.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Sūrah</strong>: a chapter of the Qur'an.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Synoptic Gospels</strong>: Matthew, Mark and Luke, which share much material.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Syriac</strong>: a dialect of Aramaic with its own alphabet, the classical language of several Eastern churches.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Tafsīr</strong>: exegesis of the Qur'an.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Talmud</strong>: the Mishnah together with its commentary, the Gemara.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Tanakh</strong>: the Hebrew Bible.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Targum</strong>: an Aramaic translation of a book of the Hebrew Bible.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Tarmida</strong>: a Mandaean priest; the priesthood is hereditary, and only priests may copy the scriptures and conduct the rites.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Tawḥīd</strong>: the oneness of God, the foundation of Islamic belief.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Torah</strong>: the five books of <a href="/reference/figures/#moses">Moses</a>; more broadly, all Jewish teaching.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Trinity</strong>: the Christian doctrine of one God in three persons.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Ummah</strong>: the worldwide community of Muslims.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Yardna</strong>: running water fit for Mandaean baptism; still water will not serve. Most scholars take the word from the river Jordan, although E. S. Drower doubted the connection.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://quran.com/">The Qur’an (Quran.com)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:comparisons', 'photo' => array( 'name' => 'page-comparisons', 'alt' => 'Comparisons on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'comparisons', 'title' => 'Comparative studies', 'parent' => 'page:knowledge-base',
			'excerpt' => 'How Judaism, Mandaeism, Christianity and Islam approach God, scripture, prophecy, law and the afterlife.', 'description' => 'Comparisons of Judaism, Mandaeism, Christianity and Islam on God, scripture, prophets and practice. Compare them here.', 'menu_order' => 9, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Comparisons between the traditions follow, topic by topic. Comparison helps readers see where the Abrahamic traditions agree and where they part ways. It works best when each tradition is described in its own terms before any contrast is drawn.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-category-itself">Comparisons: the category itself</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-four-traditions-at-a-glance">The four traditions at a glance</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#god">God</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#revelation-and-scripture">Revelation and scripture</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#prophets">Prophets</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#law-and-practice">Law and practice</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-afterlife">The afterlife</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-traditions-in-pairs">The traditions in pairs</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-category-itself"} -->
<h2 class="wp-block-heading" id="the-category-itself">Comparisons: the category itself</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The phrase "Abrahamic religions" is younger than the traditions it groups. Before the middle of the twentieth century, appeals to <a href="/journal/who-was-abraham/">Abraham</a> ran the other way: each community invoked him to argue that it, and not its neighbours, was the rightful heir of what had been promised to him. The ecumenical sense, in which Abraham stands for common ground, took hold after the Second World War and spread through interfaith and academic discourse, and again after 2001.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> One scholar of religion argues that the category is an invention with no historical referent, serviceable in dialogue and unreliable as a tool of analysis.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Two consequences follow. The grouping is a modern convenience, so its boundaries are arguable, and restricting the family to three traditions has itself been questioned: <a href="/religions/mandaeism/">Mandaeism</a>, too, traces a line of prophets back to Abraham's own forebears. The older use of Abraham, as the figure the communities argued over, also sits closer to what the sources show than the modern picture of a heritage held in common.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The oldest scripture to speak of a religion of Abraham standing before the later communities is the <a href="/reference/sacred-texts/quran/">Qur'an</a>. It observes that the Torah and the Gospel were revealed after Abraham, calls him a <em>ḥanīf</em> and a <em>muslim</em> in the root sense of one who submitted to God, and summons its hearers to the <em><a href="/journal/millat-ibrahim/">millat Ibrāhīm</a></em> (<span lang="ar" dir="rtl">ملة إبراهيم</span>, the path of Abraham).<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> On the Qur'an's own account, then, the idea of an Abrahamic religion is older than the modern phrase by some thirteen centuries, and it has a definite content: the worship of God alone.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-four-traditions-at-a-glance"} -->
<h2 class="wp-block-heading" id="the-four-traditions-at-a-glance">The four traditions at a glance</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This table gathers the themes the sections below discuss. The <a href="/#comparison">home page</a> carries five of these rows; all eleven are here.</p>
<!-- /wp:paragraph -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><tr><th>Theme</th><th>Judaism</th><th>Mandaeism</th><th>Christianity</th><th>Islam</th></tr><tr><td>Belief in God</td><td>Strict monotheism; one God in covenant with Israel</td><td>One God, the Great Life; light and darkness opposed</td><td>One God understood as Trinity: Father, Son, Holy Spirit</td><td>Tawḥīd, the absolute oneness of God</td></tr><tr><td>Sacred texts</td><td>Torah, Tanakh, Talmud, rabbinic literature</td><td>Ginza Rabba, Qolasta, the Book of John, in Mandaic</td><td>Old and New Testaments; canons vary by church</td><td>Qur'an; ḥadīth as the record of prophetic practice</td></tr><tr><td>Abraham</td><td>Patriarch, father of the Jewish people</td><td>Not accepted as a prophet</td><td>Father of faith and recipient of the promise</td><td>Ibrāhīm, prophet and exemplar of pure monotheism</td></tr><tr><td>Moses</td><td>Prophet and lawgiver who received the Torah</td><td>Not accepted as a prophet</td><td>Prophet and lawgiver of the Old Covenant</td><td>Mūsā, prophet who received the Tawrāt</td></tr><tr><td>Jesus</td><td>Historical figure; not accepted as Messiah</td><td>Held to have altered the teaching of John</td><td>Messiah, Son of God, and Saviour</td><td>ʿĪsā, prophet and Messiah; not divine</td></tr><tr><td>Prophets</td><td>Many prophets; prophecy ceased in antiquity</td><td>Adam to Aram; John the Baptist last</td><td>Old Testament prophets; John the Baptist</td><td>A line of prophets sealed by Muhammad</td></tr><tr><td>Prayer</td><td>Three daily services; synagogue worship</td><td>Three times a day, facing north, after washing</td><td>Personal and liturgical prayer; the Lord's Prayer</td><td>Ṣalāh five times daily, facing Makkah</td></tr><tr><td>Major festivals</td><td>Passover, Yom Kippur, Sukkot, Hanukkah</td><td>Dehwa Rabba; Dehwa Daimana, the birth of John</td><td>Christmas, Easter, Pentecost</td><td>ʿĪd al-Fiṭr, ʿĪd al-Aḍḥā</td></tr><tr><td>Places</td><td>Jerusalem, Hebron, Mount Sinai</td><td>Rivers of southern Iraq and Khuzestan</td><td>Jerusalem, Bethlehem, Nazareth, Rome</td><td>Makkah, Madinah, Jerusalem</td></tr><tr><td>Ethics</td><td>Rooted in Torah and rabbinic tradition</td><td>Purity, truthfulness, charity and strict pacifism</td><td>Love of God and neighbour; the Sermon on the Mount</td><td>Guided by the Qur'an, sunnah and sharia</td></tr><tr><td>Afterlife</td><td>Diverse views; Olam Ha-Ba, the world to come</td><td>The soul's ascent to the World of Light</td><td>Resurrection, judgement, heaven and hell</td><td>Resurrection, judgement, paradise and hellfire</td></tr></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>The Venn diagram below shows, in simplified form, which beliefs all four traditions hold, which three of them share, and which belong to Mandaeism alone. See <a href="/journal/abrahamic-family-tree/">The Abrahamic family tree and what the traditions share</a> for the reasoning behind it.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_diagram name="shared-beliefs" caption="A Venn diagram of the beliefs shared by Judaism, Mandaeism, Christianity and Islam, simplified. The full discussion is in The Abrahamic family tree and what the traditions share."]
<!-- /wp:shortcode -->

<!-- wp:heading {"anchor":"god"} -->
<h2 class="wp-block-heading" id="god">God</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All four traditions affirm one God, creator of the world. Mandaeism calls God the Great Life and teaches a dualism of light and darkness that the others do not share. <a href="/religions/judaism/">Judaism</a> expresses this in the Shema. <a href="/religions/christianity/">Christianity</a> affirms one God in three persons. Islam's doctrine of <em>tawḥīd</em> (<span lang="ar" dir="rtl">توحيد</span>, oneness) stresses God's absolute unity and rejects any partner to God. Jewish and Muslim theologians have long recognised how closely their understandings of divine unity agree, and medieval thinkers in both traditions developed their arguments in conversation with each other. See <a href="/journal/abrahamic-monotheism/">How the Abrahamic Religions Understand Monotheism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"revelation-and-scripture"} -->
<h2 class="wp-block-heading" id="revelation-and-scripture">Revelation and scripture</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism receives the Torah as revelation given at Sinai and interpreted through an ongoing oral tradition. Christianity sees the fullest revelation in the person of Jesus, witnessed by the scriptures. <a href="/religions/islam/">Islam</a> regards the Qur'an as God's own speech, revealed to Muhammad in Arabic and transmitted both in writing and through the memory of many reciters in every generation.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"prophets"} -->
<h2 class="wp-block-heading" id="prophets">Prophets</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Each tradition orders the prophets differently, and each order carries an argument. Jewish teaching holds that prophecy ceased in antiquity. Christian teaching reads the prophets as pointing towards Jesus. Islamic teaching describes a succession of messengers sent to every people, carrying one message whose law developed with circumstances and sealed by Muhammad; on that account the earlier communities received the same religion and departed from it.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Mandaeans count a line from Adam to Aram that closes with <a href="/journal/john-the-baptist/">John the Baptist</a>, and place the founders of the other traditions outside it.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a> describes a line of prophets from <a href="/reference/figures/#moses">Moses</a> to Malachi. Christianity sees prophecy fulfilled in Jesus. Islam recognises many biblical prophets and holds that Muhammad is the last of them.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Mandaeism holds that its knowledge was first revealed to Adam and passes down through the Ginza Rabba and a priesthood trained to read it. Its law is kept by that hereditary priesthood: it requires baptism in running water again and again through life, and it forbids killing and the carrying of weapons.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"law-and-practice"} -->
<h2 class="wp-block-heading" id="law-and-practice">Law and practice</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism and Islam are both religions of detailed law, <em>halakhah</em> and <em>sharīʿah</em> (<span lang="ar" dir="rtl">شريعة</span>, the path), developed by scholars through interpretation. Most Christian churches teach that believers are not bound by the ritual law of the Torah and place worship in sacraments and liturgy.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-afterlife"} -->
<h2 class="wp-block-heading" id="the-afterlife">The afterlife</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All four traditions teach a judgement and life beyond death, though they describe it differently. Jewish thought has held a range of views about the world to come and the resurrection of the dead. Christianity and Islam both teach bodily resurrection, judgement, and eternal reward or loss.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Mandaeism describes the judgement as an ascent. After death the soul passes through the <em>maṭarātā</em> (watch-houses), where it is purified, and reaches the scales of Abathur, where its deeds are weighed against the soul of Shitil, the purest of human souls. A soul found worthy crosses by a ship of light to the World of Light.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The front page carries a shorter version of this <a href="/#comparison">comparison</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">For the periods behind these differences, see the <a href="/reference/timeline/">History and timeline</a>; for short answers to common questions, see the <a href="/reference/faq/">FAQ</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-traditions-in-pairs"} -->
<h2 class="wp-block-heading" id="the-traditions-in-pairs">The traditions in pairs</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Readers often ask how two of the traditions compare with each other. The short answers follow; the sections above give the detail.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"anchor":"judaism-and-christianity"} -->
<h3 class="wp-block-heading" id="judaism-and-christianity">Judaism and Christianity</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christianity began as a movement within Judaism, and the Hebrew Bible is its Old Testament. The two part on Jesus: Christians hold him to be the Messiah and the Son of God, and read the covenant as opened to all nations through him, while Judaism awaits a Messiah still to come, regards no human being as divine, and lives by the commandments of the Torah as the rabbis interpreted them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"anchor":"judaism-and-islam"} -->
<h3 class="wp-block-heading" id="judaism-and-islam">Judaism and Islam</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism and Islam are close in structure. Both hold that God is strictly one, with no incarnation; both are religions of law, with a code for daily life covering prayer, diet and circumcision; both forbid images in worship; and both trace their people to Abraham, through Isaac and through Ishmael. They differ on the last prophet and the final scripture: Judaism recognises neither Jesus nor Muhammad, and Islam holds that the Qur’an confirms and completes the revelation given to Moses.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"anchor":"christianity-and-islam"} -->
<h3 class="wp-block-heading" id="christianity-and-islam">Christianity and Islam</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christianity and Islam are the two largest religions in the world, together more than half of humanity. Both honour Jesus as the Messiah, born of the virgin Mary, and both expect his return. They part on who he is: Christianity worships him as God the Son, crucified and risen, while the Qur’an honours him as a prophet and the word of God given to Mary, denies that he is divine, and denies that he was crucified. Islam also holds that Muhammad is the final prophet, which Christianity does not accept.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"anchor":"mandaeism-and-the-other-three"} -->
<h3 class="wp-block-heading" id="mandaeism-and-the-other-three">Mandaeism and the other three</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeism shares with the others belief in one God, revealed scripture and a judgement of the soul, and it honours John the Baptist, as Christianity and Islam do. It rejects Abraham, Moses, Jesus and Muhammad as prophets, and practises baptism repeatedly, always in running water.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Aaron W. Hughes, Abrahamic Religions: On the Uses and Abuses of History (New York: Oxford University Press, 2012), pp. 17-35. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Ibid., p. 35. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3"><a href="https://quran.com/2/135">Qur'an 2:135</a>; 3:65-67. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ismaʿil Raji al Faruqi, in Wing-tsit Chan, Ismaʿil Raji al Faruqi, Joseph M. Kitagawa and P. T. Raju, comps., The Great Asian Religions: An Anthology (New York: Macmillan, 1969), pp. 323, 326. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), pp. 197-199. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:islamic-dilemma', 'photo' => array( 'name' => 'page-islamic-dilemma', 'alt' => 'What is the Islamic Dilemma? The verses of the Qur’an on earlier scripture' ), 'type' => 'page', 'slug' => 'islamic-dilemma', 'title' => 'What is the Islamic Dilemma?', 'parent' => 'page:comparisons',
			'excerpt' => 'The Islamic Dilemma argument explained: what it claims, the verses it relies on, and the Muslim reply.', 'description' => 'What is the Islamic Dilemma? The argument, the verses it cites and the Muslim reply, explained. Read the guide.', 'menu_order' => 20, 'special' => '', 'since' => 79,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>What is the Islamic Dilemma? The Islamic Dilemma is an argument made by Christian apologists, above all David Wood, that Islam defeats itself in what it says about the Bible. This page explains the argument, lists the verses it relies on, and summarises the Muslim reply. The Journal article <a href="/journal/the-islamic-dilemma/">The Islamic Dilemma: the argument and the answer</a> examines it in full. The argument circulates widely in online debate, and readers often meet it before they meet the verses themselves; this page sets the two side by side.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-argument">What is the Islamic Dilemma? The argument</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-islamic-dilemma-verses">The verses</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-muslim-reply">The Muslim reply</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#further-reading">Further reading</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="dilemma-quran-light" alt="A page of the Qur’an in warm light" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-argument"} -->
<h2 class="wp-block-heading" id="the-argument">What is the Islamic Dilemma? The argument</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The argument runs in two horns. The Qur’an affirms the Torah and the Gospel. If the Gospel is the word of God, Islam is false, because the Qur’an contradicts the Gospel on the divinity of Jesus and on his crucifixion. If the Gospel is not the word of God, Islam is still false, because the Qur’an affirmed it. Either way, the argument concludes, Islam cannot stand.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-islamic-dilemma-verses"} -->
<h2 class="wp-block-heading" id="the-islamic-dilemma-verses">The verses</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The argument relies on the following verses, given here in the Saheeh International translation:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><strong>Qur’an 3:3-4</strong>: He has sent down upon you, [O Muḥammad], the Book in truth, confirming what was before it. And He revealed the Torah and the Gospel before, as guidance for the people.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Qur’an 5:46</strong>: And We sent, following in their footsteps, Jesus, the son of Mary, confirming that which came before him in the Torah; and We gave him the Gospel, in which was guidance and light and confirming that which preceded it of the Torah as guidance and instruction for the righteous.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Qur’an 5:47</strong>: And let the People of the Gospel judge by what Allāh has revealed therein.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Qur’an 5:68</strong>: Say, “O People of the Scripture, you are [standing] on nothing until you uphold [the law of] the Torah, the Gospel, and what has been revealed to you from your Lord.”</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Qur’an 10:94</strong>: So if you are in doubt, [O Muḥammad], about that which We have revealed to you, then ask those who have been reading the Scripture before you.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Surah 5:46 is the verse most often searched for in connection with the argument, because it says that the Gospel given to Jesus contained guidance and light.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-muslim-reply"} -->
<h2 class="wp-block-heading" id="the-muslim-reply">The Muslim reply</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muslim scholars answer that the dilemma rests on three premises the Qur’an does not accept. First, the Qur’an confirms earlier scripture as its <em>muhaymin</em> (<span lang="ar" dir="rtl">مُهَيْمِن</span>, guardian and criterion): in the words of the classical exegete al-Ṭabarī, whatever in the earlier books agrees with the Qur’an is true, and whatever disagrees with it is false.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Second, the Gospel of the Qur’an is the revelation given to Jesus, which is not the same thing as the four Gospels written about him. Third, the Qur’an itself speaks of people who wrote scripture with their own hands and distorted words from their places, so it never vouched for every text its hearers possessed.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> On this reading the Qur’an can confirm the Torah and the Gospel as revelations and still judge the texts that carry them, and the dilemma loses both its horns.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"further-reading"} -->
<h2 class="wp-block-heading" id="further-reading">Further reading</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><a href="/journal/the-islamic-dilemma/">The Islamic Dilemma: the argument and the answer</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="/journal/transmission-of-scripture/">The preservation and transmission of scripture</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="/reference/sacred-texts/quran/">The Qur’an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="/reference/sacred-texts/bible/">The Bible</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="https://themuslimapologist.online/articles/the-islamic-dilemma/">The Islamic Dilemma, refuted</a> (The Muslim Apologist)</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">“What is the ‘Islamic Dilemma’?,” The Islamic Dilemma (islamicdilemma.com). <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur’an 3:3-4; 5:46-47; 5:68; 10:94, trans. Saheeh International, Quran.com. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 5:48; Ibn Kathīr, <em>Tafsīr</em>, on 5:48, quoting al-Ṭabarī. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur’an 2:79; 3:78; 5:13. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:guides', 'photo' => array( 'name' => 'page-guides', 'alt' => 'The four religions on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'religions', 'title' => 'Religions', 'parent' => '',
			'excerpt' => 'Introductions to Judaism, Mandaeism, Christianity and Islam, the traditions of the Abrahamic family.', 'description' => 'The four Abrahamic religions: Judaism, Mandaeism, Christianity and Islam, each introduced. Choose one to begin.', 'menu_order' => 10, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:heading {"anchor":"the-four-religions-at-a-glance"} -->
<h2 class="wp-block-heading" id="the-four-religions-at-a-glance">The four religions at a glance</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The four traditions covered here share a story that begins with Adam and, for three of them, runs through Abraham. Judaism is the oldest of the four as a continuous tradition; Mandaeism the smallest; Christianity and Islam the largest, together followed by more than half of humanity. Each page sets out a religion’s origins, beliefs, scripture and practice.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-four-religions-at-a-glance">The four religions at a glance</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#going-further">Going further</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Judaism, Christianity and Islam are the three largest traditions that trace their heritage to Abraham. Mandaeism, far smaller and older than Islam, belongs to the same family by descent and history. Each guide below introduces a tradition's origins, scripture, beliefs and practice, and the communities that live it today.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_child_pages]
<!-- /wp:shortcode -->

<!-- wp:heading {"anchor":"going-further"} -->
<h2 class="wp-block-heading" id="going-further">Going further</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li>The <a href="/reference/">Reference</a> section gathers material on sacred texts, key figures, sacred places and history.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="/reference/comparisons/">Comparative studies</a> sets out where the traditions agree and where they differ.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The <a href="/journal/">Journal</a> section offers longer explainers on single questions.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://www.pewresearch.org/religion/2025/06/09/how-the-global-religious-landscape-changed-from-2010-to-2020/">The global religious landscape (Pew Research Center)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:research', 'photo' => array( 'name' => 'page-research', 'alt' => 'Research on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'research', 'title' => 'Research', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Approaches, methods and source-handling for the academic study of the Abrahamic religions.', 'description' => 'Methods and source handling for studying the Abrahamic religions fairly. Read our research approach.', 'menu_order' => 11, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Research on religion begins with the sources themselves. The academic study of religion draws on several disciplines: textual criticism, comparative history, archaeology and anthropology among them, each with its own methods and limits.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#approaches">Research: approaches</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#working-with-sources">Working with sources</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#describing-traditions-accurately">Describing traditions accurately</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"approaches"} -->
<h2 class="wp-block-heading" id="approaches">Research: approaches</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><strong>Historical study</strong> places texts, people and institutions in their time and asks what the surviving evidence can support.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Textual scholarship</strong> compares manuscripts, traces how texts were transmitted and studies their language.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Comparative study</strong> sets traditions side by side to understand each more clearly.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Archaeology</strong> recovers material evidence, from inscriptions to buildings.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Theology and philosophy</strong> examine the internal reasoning of each tradition.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"working-with-sources"} -->
<h2 class="wp-block-heading" id="working-with-sources">Working with sources</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Primary sources are the scriptures, commentaries, inscriptions and documents produced within a tradition or period. Secondary sources are later studies of them. Good practice reads primary sources in reliable translations, notes which translation is used, checks claims against more than one scholarly account, and separates what a tradition teaches from what historians can establish.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"describing-traditions-accurately"} -->
<h2 class="wp-block-heading" id="describing-traditions-accurately">Describing traditions accurately</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Each tradition deserves to be described as its adherents understand it before it is analysed from outside. See our <a href="/about/editorial-policy/">Editorial policy</a> for the conventions we follow.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://plato.stanford.edu/entries/medieval-philosophy/">Medieval philosophy (Stanford Encyclopedia of Philosophy)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:about', 'photo' => array( 'name' => 'page-about', 'alt' => 'About on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'about', 'title' => 'About this site', 'parent' => '',
			'excerpt' => 'Abrahamic Religions is an independent educational platform on Judaism, Mandaeism, Christianity and Islam.', 'description' => 'About Abrahamic Religions: why the site exists, how its content is sourced and why it is independent. Read about us.', 'menu_order' => 12, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>About this site: what it is for, how it is made, and who it serves. Abrahamic Religions is an independent educational resource on the histories, scriptures, beliefs and practices of Judaism, Mandaeism, Christianity and Islam.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#our-purpose">About: our purpose</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-four-traditions">The four traditions</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-the-content-is-made">How the content is made</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#independence">Independence</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#our-approach">Our approach</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#get-in-touch">Get in touch</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"our-purpose"} -->
<h2 class="wp-block-heading" id="our-purpose">About: our purpose</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abrahamic Religions exists to introduce the Abrahamic religions and their history, and to give the reader what is needed to decide which among them is true. That question is the reason it was made. Each tradition is therefore set out as it teaches itself, with the sources of its claims and how those claims stand when examined, and the conclusion is left to the reader.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>We write for students, teachers, researchers and curious readers who want clear, well-sourced information. Where a question turns on the wording of a text, we go to the languages in which it was written.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-four-traditions"} -->
<h2 class="wp-block-heading" id="the-four-traditions">The four traditions</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The four traditions are Judaism, Mandaeism, Christianity and Islam. Judaism, Christianity and Islam are the largest, and all three look to Abraham as their father in faith. Mandaeism is the smallest and the oldest surviving Gnostic religion; it shares the prophetic line from Adam to Shem, the Aramaic world of late antiquity and, since the seventh century, recognition as the Sabians named in the Qur’an. Other communities are sometimes described as Abrahamic; their claim on Abraham runs through one of these four.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-the-content-is-made"} -->
<h2 class="wp-block-heading" id="how-the-content-is-made">How the content is made</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Every article rests on sources that a reader can check. Scripture is quoted from published translations and, where the wording matters, from the original Hebrew, Greek, Aramaic or Arabic. Scholarly claims are footnoted to the work and page they come from, and each citation is checked against its source before publication. Photographs are either in the public domain or used under open licences, and every one is credited on the <a href="/dmca/">Copyright and DMCA</a> page. In keeping with the sensibilities of the traditions described, the site shows places, buildings and manuscripts, and never depicts the prophets.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"independence"} -->
<h2 class="wp-block-heading" id="independence">Independence</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abrahamic Religions is not affiliated with any religious body, university, government or political organisation, and no article is commissioned or paid for by one. The site carries no advertising and sells nothing; its costs are met by readers who choose to support it through the Donate page.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"our-approach"} -->
<h2 class="wp-block-heading" id="our-approach">Our approach</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Articles are written for a general audience and reviewed for accuracy. Each tradition is presented as its adherents understand it, alongside what historical scholarship can tell us. Where we argue for a conclusion, we mark it as argument and set out the evidence first. Our <a href="/about/editorial-policy/">Editorial policy</a> sets out these commitments in full.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_child_pages]
<!-- /wp:shortcode -->

<!-- wp:heading {"anchor":"get-in-touch"} -->
<h2 class="wp-block-heading" id="get-in-touch">Get in touch</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Questions, corrections and suggestions are welcome through the <a href="/about/contact/">Contact us</a> page.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://creativecommons.org/licenses/">Creative Commons licences</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:editorial-policy', 'photo' => array( 'name' => 'page-editorial-policy', 'alt' => 'Our editorial policy on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'editorial-policy', 'title' => 'Editorial policy', 'parent' => 'page:about',
			'excerpt' => 'The standards of accuracy, sourcing and correction that govern content on Abrahamic Religions.', 'description' => 'Our standards of accuracy, sourcing, language and correction. Read the Abrahamic Religions editorial policy.', 'menu_order' => 13, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>This editorial policy sets out the standards every page meets. Content on Abrahamic Religions is prepared, reviewed and corrected under the following principles.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#describing-traditions">Our editorial policy: describing traditions</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#sources-and-citations">Sources and citations</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#language-and-conventions">Language and conventions</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#images">Images</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#corrections">Corrections</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#editorial-responsibility">Editorial responsibility</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"describing-traditions"} -->
<h2 class="wp-block-heading" id="describing-traditions">Our editorial policy: describing traditions</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Each tradition is first described in its own terms, using the language its adherents use. Where traditions disagree, we set out each position together with the reasons given for it. Where an article reaches a conclusion of its own, the evidence comes first and the conclusion is marked as ours. Historical findings are presented as findings, with their limits stated.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"sources-and-citations"} -->
<h2 class="wp-block-heading" id="sources-and-citations">Sources and citations</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Articles draw on scripture, on the classical sources of each tradition and on established scholarship. Every factual claim that a reader might want to check carries a footnote giving the work and, for printed books, the page. Citations are checked against the source itself before publication and are never written from memory. Where scholars disagree, we say so and name the positions.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Scripture is quoted from published translations, which are named in the footnotes; the Qur’an is quoted in Arabic with an English translation beside it. Hadith are cited by collection and number as given by Sunnah.com.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"language-and-conventions"} -->
<h2 class="wp-block-heading" id="language-and-conventions">Language and conventions</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li>Dates use BCE and CE.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Arabic, Hebrew and Aramaic terms appear in transliteration with a translation on first use.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Names follow common English usage, with the form used in other traditions noted where helpful.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"images"} -->
<h2 class="wp-block-heading" id="images">Images</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Photographs show places, buildings, manuscripts and objects. None depicts a prophet. Every photograph is either in the public domain or used under an open licence that permits its use here, and each is credited with its author, licence and source on the Copyright and DMCA page.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"corrections"} -->
<h2 class="wp-block-heading" id="corrections">Corrections</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We correct factual errors as soon as we confirm them and note significant corrections at the end of the article. To report an error, use the <a href="/about/contact/">Contact us</a> page, giving the page address and the passage concerned.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"editorial-responsibility"} -->
<h2 class="wp-block-heading" id="editorial-responsibility">Editorial responsibility</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Editorial decisions rest with the editors of Abrahamic Religions. No religious body, sponsor or advertiser has a say in what is published. Suggestions from readers are welcome and are weighed on their merits.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://sunnah.com/">Sunnah.com</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:contact', 'photo' => array( 'name' => 'page-contact', 'alt' => 'Contact on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'contact', 'title' => 'Contact us', 'parent' => 'page:about',
			'excerpt' => 'How to reach the editors of Abrahamic Religions with questions, corrections and suggestions.', 'description' => 'Contact the editors of Abrahamic Religions with questions, corrections or suggestions. Write to us here.', 'menu_order' => 14, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>We welcome questions, corrections and suggestions from readers.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#writing-to-us">Contact: writing to us</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#reporting-an-error">Reporting an error</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#copyright">Copyright</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#newsletter">Newsletter</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"writing-to-us"} -->
<h2 class="wp-block-heading" id="writing-to-us">Contact: writing to us</h2>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[abr_contact_email]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>We read every message. We cannot answer requests for personal religious rulings or advice, which are best taken to a scholar or minister of your own tradition.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"reporting-an-error"} -->
<h2 class="wp-block-heading" id="reporting-an-error">Reporting an error</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Please include the address of the page, the passage concerned and, where you can, the source that shows the correction. Confirmed errors are corrected promptly, as our <a href="/about/editorial-policy/">Editorial policy</a> describes.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"copyright"} -->
<h2 class="wp-block-heading" id="copyright">Copyright</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>If you believe material on the site infringes your copyright, please follow the procedure on the <a href="/dmca/">Copyright and DMCA</a> page, which sets out what a notice must contain.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"newsletter"} -->
<h2 class="wp-block-heading" id="newsletter">Newsletter</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>To receive new articles and explainers, use the sign-up form at the foot of the home page.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://www.copyright.gov/dmca/">The Digital Millennium Copyright Act (US Copyright Office)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:privacy-policy', 'photo' => array( 'name' => 'page-privacy-policy', 'alt' => 'Our privacy policy on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'privacy-policy', 'title' => 'Privacy policy', 'parent' => '',
			'excerpt' => 'How Abrahamic Religions handles information about visitors.', 'description' => 'What Abrahamic Religions collects, which cookies it sets and how to request your data. Read our privacy policy.', 'menu_order' => 15, 'special' => 'privacy', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>This privacy policy explains what information the site collects and why. Abrahamic Religions collects as little information about its readers as it can. This policy explains what is collected, why, and what choices you have. Last revised in September 2026.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#what-we-do-not-collect">Our privacy policy: what we do not collect</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#information-we-collect">Information we collect</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#stored-on-your-device">Stored on your device</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#fonts-and-images">Fonts and images</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#your-rights">Your rights</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#changes">Changes</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"what-we-do-not-collect"} -->
<h2 class="wp-block-heading" id="what-we-do-not-collect">Our privacy policy: what we do not collect</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Readers need no account, and the site asks them for no personal details. It carries no advertising and no advertising trackers, and it does not sell or share information about its readers.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"information-we-collect"} -->
<h2 class="wp-block-heading" id="information-we-collect">Information we collect</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>Server logs.</strong> Like most websites, our host records technical data such as IP addresses, browser type, referring pages and the time of each request, for security and maintenance. These records are kept for a limited period and are not used to identify readers.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Analytics.</strong> Where analytics are enabled, visits are measured in aggregate with Google Analytics, which sets its own cookies under its own terms. You can block them in your browser settings.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Messages.</strong> If you write to us, we keep your message and your address so that we can reply, and for no other purpose.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Newsletter.</strong> If you subscribe, your email address is handled by our mailing service under its own privacy terms, and you can unsubscribe at any time from any newsletter you receive.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Donations.</strong> Gifts are handled by the payment provider named on the Donate page, under its own privacy terms. We receive confirmation of a gift and never see your card or account details.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"stored-on-your-device"} -->
<h2 class="wp-block-heading" id="stored-on-your-device">Stored on your device</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Your choice of light or dark reading mode is remembered in your own browser’ storage, so that the site opens in the mode you chose. It is never sent to us, and clearing your browser data removes it. WordPress sets cookies only for people who sign in to manage the site.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"fonts-and-images"} -->
<h2 class="wp-block-heading" id="fonts-and-images">Fonts and images</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The typefaces and photographs used on the site are served from our own server, so reading an article does not send your address to a font service or image host.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"your-rights"} -->
<h2 class="wp-block-heading" id="your-rights">Your rights</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>You may ask us what personal data we hold about you, and ask us to correct or erase it. Use the <a href="/about/contact/">Contact us</a> page to make a request, and we will respond within a reasonable period.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"changes"} -->
<h2 class="wp-block-heading" id="changes">Changes</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Any change to how reader information is handled will appear here with a new revision date.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://policies.google.com/privacy">Google Privacy Policy</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:terms', 'photo' => array( 'name' => 'page-terms', 'alt' => 'The terms on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'terms', 'title' => 'Terms of use', 'parent' => '',
			'excerpt' => 'The terms of use that apply to the Abrahamic Religions website.', 'description' => 'The terms of use for Abrahamic Religions: accuracy, copyright, quoting and acceptable use. Read them here.', 'menu_order' => 16, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>By using Abrahamic Religions you agree to these terms of use.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#educational-purpose">The terms: educational purpose</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#accuracy">Accuracy</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#our-content">Our content</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#material-from-others">Material from others</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#acceptable-use">Acceptable use</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#links-to-other-sites">Links to other sites</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#liability">Liability</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#changes">Changes</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#questions">Questions</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"educational-purpose"} -->
<h2 class="wp-block-heading" id="educational-purpose">The terms: educational purpose</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The content is provided for general education. It is not religious, legal or professional advice, and it should not be relied on as a substitute for such advice.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"accuracy"} -->
<h2 class="wp-block-heading" id="accuracy">Accuracy</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We work to keep the content accurate and up to date, as described in our <a href="/about/editorial-policy/">Editorial policy</a>, but we make no warranty that it is complete or free of error. Where you find an error, we would be grateful to hear of it.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"our-content"} -->
<h2 class="wp-block-heading" id="our-content">Our content</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Unless stated otherwise, the text, diagrams and design of the site belong to Abrahamic Religions. You may quote short passages for teaching, study, criticism or review, provided you name Abrahamic Religions as the source and link to the page quoted. Reproducing whole articles, or substantial parts of them, requires written permission.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"material-from-others"} -->
<h2 class="wp-block-heading" id="material-from-others">Material from others</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Scripture translations belong to their publishers and are quoted in short passages with attribution. Photographs belong to their authors and are used under the licences listed on the <a href="/dmca/">Copyright and DMCA</a> page; if you reuse one, you must follow its own licence and credit its author. Nothing in these terms grants rights in material that belongs to others.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"acceptable-use"} -->
<h2 class="wp-block-heading" id="acceptable-use">Acceptable use</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>You may read, share and link to the site freely. You may not copy its content in bulk for republication, present its articles as your own, interfere with the working of the site, or use the contact address to send unsolicited advertising.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"links-to-other-sites"} -->
<h2 class="wp-block-heading" id="links-to-other-sites">Links to other sites</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Links to other websites are provided for further reading. We do not control those sites and are not responsible for their content or their privacy practices.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"liability"} -->
<h2 class="wp-block-heading" id="liability">Liability</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The site is provided as it is. To the extent the law allows, Abrahamic Religions is not liable for any loss arising from the use of the site or from reliance on its content.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"changes"} -->
<h2 class="wp-block-heading" id="changes">Changes</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We may revise these terms at any time. The version published here is the one in force, and continued use of the site means acceptance of it.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"questions"} -->
<h2 class="wp-block-heading" id="questions">Questions</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Questions about these terms can be sent through the <a href="/about/contact/">Contact us</a> page. Copyright notices should follow the procedure on the <a href="/dmca/">Copyright and DMCA</a> page.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://creativecommons.org/licenses/">Creative Commons licences</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:knowledge-base', 'photo' => array( 'name' => 'page-knowledge-base', 'alt' => 'The reference section on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'reference', 'title' => 'Reference', 'parent' => '',
			'excerpt' => 'Reference material on the scriptures, figures, places, history and vocabulary of the Abrahamic traditions.', 'description' => 'Reference material on scriptures, figures, places, history and key terms. Explore the Abrahamic Religions reference section.', 'menu_order' => 20, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">On this page</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#about-the-reference-section">About the reference section</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#using-the-guides">Using the guides</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"about-the-reference-section"} -->
<h2 class="wp-block-heading" id="about-the-reference-section">About the reference section</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The reference section gathers the site’s standing guides: the sacred texts, the figures and places the traditions share, a timeline, comparisons, a glossary and answers to frequent questions. Each guide is written to be read on its own, in plain language, with sources for its claims, and each links to the Journal articles that treat its subjects in depth. Students will find here the facts they need in one place; general readers can start with the questions and follow the links that interest them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"using-the-guides"} -->
<h2 class="wp-block-heading" id="using-the-guides">Using the guides</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Each guide can be read on its own. Start with the frequently asked questions for short answers, turn to the timeline for the order of events, and use the glossary whenever an unfamiliar term appears.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Reference section collects material for readers who want to look something up or study a subject in depth. Each section is written for a general audience and linked to related articles.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_child_pages]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>For introductions to each tradition, start with <a href="/religions/">Religions</a>.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://quran.com/">The Qur’an (Quran.com)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:timeline', 'photo' => array( 'name' => 'page-timeline', 'alt' => 'The timeline on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'timeline', 'title' => 'History and timeline', 'parent' => 'page:knowledge-base',
			'excerpt' => 'A chronological overview of the Abrahamic traditions from the ancient Near East to the present.', 'description' => 'From the ancient Near East to the modern era, the key periods of four traditions. Follow the timeline.', 'menu_order' => 21, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>This timeline outlines the main periods in the history of Judaism, Mandaeism, Christianity and Islam. Dates before the first millennium BCE rest largely on tradition and are approximate.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#ancient-near-east-c-2000-to-1200-bce">The timeline: ancient Near East (c. 2000 to 1200 BCE)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-israelite-kingdoms-c-1000-to-586-bce">The Israelite kingdoms (c. 1000 to 586 BCE)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-second-temple-period-516-bce-to-70-ce">The Second Temple period (516 BCE to 70 CE)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#jesus-and-the-early-church-c-4-bce-to-313-ce">Jesus and the early church (c. 4 BCE to 313 CE)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#rabbinic-judaism-and-the-christian-empire-70-to-c-600-ce">Rabbinic Judaism and the Christian empire (70 to c. 600 CE)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-rise-of-islam-610-to-750-ce">The rise of Islam (610 to 750 CE)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-medieval-world-750-to-1500">The medieval world (750 to 1500)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-early-modern-era-1500-to-1800">The early modern era (1500 to 1800)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-modern-era-1800-to-the-present">The modern era (1800 to the present)</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="ur-ziggurat" alt="The restored ziggurat of Ur in southern Iraq, built around 2100 BCE" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ancient-near-east-c-2000-to-1200-bce"} -->
<h2 class="wp-block-heading" id="ancient-near-east-c-2000-to-1200-bce">The timeline: ancient Near East (c. 2000 to 1200 BCE)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The biblical narratives of <a href="/journal/who-was-abraham/">Abraham</a>, Isaac and Jacob are set in this period, although no source outside scripture names them. The Merneptah Stele of about 1208 BCE contains the earliest known reference to a people called Israel.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-israelite-kingdoms-c-1000-to-586-bce"} -->
<h2 class="wp-block-heading" id="the-israelite-kingdoms-c-1000-to-586-bce">The Israelite kingdoms (c. 1000 to 586 BCE)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>According to the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a>, <a href="/reference/figures/#david">David</a> made Jerusalem his capital and Solomon built the First Temple. The kingdom later divided into Israel in the north, conquered by Assyria in 722 BCE, and Judah in the south, conquered by Babylon in 586 BCE, when the Temple was destroyed and many were taken into exile.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-second-temple-period-516-bce-to-70-ce"} -->
<h2 class="wp-block-heading" id="the-second-temple-period-516-bce-to-70-ce">The Second Temple period (516 BCE to 70 CE)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Exiles returned under Persian rule and completed the Second Temple in 516 BCE. The region later came under Greek and then Roman control. <a href="/religions/judaism/">Judaism</a> in this period was diverse, and many of the writings found among the Dead Sea Scrolls date from it. The Romans destroyed the Temple in 70 CE.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"jesus-and-the-early-church-c-4-bce-to-313-ce"} -->
<h2 class="wp-block-heading" id="jesus-and-the-early-church-c-4-bce-to-313-ce">Jesus and the early church (c. 4 BCE to 313 CE)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jesus of Nazareth taught in Galilee and Judea and was crucified in <a href="/journal/jerusalem-in-three-traditions/">Jerusalem</a> around 30 CE. His followers spread their message across the Roman Empire, where Christians faced periods of persecution. The <a href="/reference/sacred-texts/bible/">New Testament</a> writings date from the first century and the early second century.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>In the same centuries, by the account the Mandaeans keep in their own scroll, their forebears left Jerusalem for the Median hills under a Parthian king. The colophons of their scriptures carry an unbroken chain of copyists back to the second or third century.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"rabbinic-judaism-and-the-christian-empire-70-to-c-600-ce"} -->
<h2 class="wp-block-heading" id="rabbinic-judaism-and-the-christian-empire-70-to-c-600-ce">Rabbinic Judaism and the Christian empire (70 to c. 600 CE)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>After 70 CE, rabbinic sages reshaped Jewish life around study, prayer and law, producing the Mishnah and the Talmuds. The Edict of Milan in 313 granted Christians freedom of worship, and in 380 <a href="/religions/christianity/">Christianity</a> became the official religion of the Roman Empire. Church councils defined core Christian doctrine.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-rise-of-islam-610-to-750-ce"} -->
<h2 class="wp-block-heading" id="the-rise-of-islam-610-to-750-ce">The rise of Islam (610 to 750 CE)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muslims date the first revelation to Muhammad to about 610. The <em>hijrah</em> to Madinah (Medina) in 622 begins the Islamic calendar. After the Prophet's death in 632, the Rashidun caliphs (632 to 661) and the Umayyad dynasty (661 to 750) ruled a state that stretched from Spain to Central Asia. Jews and Christians under the new rule kept their worship and their communal courts as protected peoples, and the Mandaeans of southern Iraq were recognised as the <a href="/journal/the-sabians-of-the-quran/">Sabians</a> of the <a href="/reference/sacred-texts/quran/">Qur'an</a>, and so as a people of the book.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-medieval-world-750-to-1500"} -->
<h2 class="wp-block-heading" id="the-medieval-world-750-to-1500">The medieval world (750 to 1500)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Under the Abbasid caliphs, Baghdad became a centre of learning until its fall to the Mongols in 1258. Jewish, Christian and Muslim philosophers exchanged ideas, often through translation. The Crusades, launched in 1095, brought a century of Latin rule to Jerusalem. In 1453 the Ottomans took Constantinople, and in 1492 the Catholic monarchs completed their conquest of Granada and expelled Spain's Jews.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-early-modern-era-1500-to-1800"} -->
<h2 class="wp-block-heading" id="the-early-modern-era-1500-to-1800">The early modern era (1500 to 1800)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Protestant Reformation, beginning in 1517, divided Western Christianity. The Ottoman Empire ruled Jerusalem from 1517 and much of the Muslim Middle East for four centuries. Jewish communities flourished and suffered in turn across Europe and the Ottoman lands.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-modern-era-1800-to-the-present"} -->
<h2 class="wp-block-heading" id="the-modern-era-1800-to-the-present">The modern era (1800 to the present)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The modern period brought new religious movements, colonial rule and its end, and mass migration. During the Holocaust, Nazi Germany and its collaborators murdered some six million Jews. The State of Israel was established in 1948, and the war that followed displaced a large Palestinian Arab population. The Second Vatican Council (1962 to 1965) reshaped Catholic relations with Jews and Muslims, and organised <a href="/journal/interfaith-dialogue/">interfaith dialogue</a> grew worldwide. The violence that followed 2003 drove most Mandaeans from Iraq, and the community now lives chiefly in diaspora.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>For a closer look at single periods, see the <a href="/journal/">Journal</a> section.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://www.britannica.com/topic/Judaism">Judaism (Encyclopaedia Britannica)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:faq', 'photo' => array( 'name' => 'page-faq', 'alt' => 'The FAQ on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'faq', 'title' => 'Frequently asked questions', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Short answers to common questions about Judaism, Mandaeism, Christianity, Islam and their shared heritage.', 'description' => 'FAQ: answers to common questions about the Abrahamic religions, from Abraham to the largest faith. Find your answer.', 'menu_order' => 22, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>This FAQ answers the questions readers ask most often. Short answers to the questions most often asked about the Abrahamic traditions, each with a link to a fuller account.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#what-are-the-abrahamic-religions">The FAQ: what are the Abrahamic religions?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#why-are-they-called-abrahamic">Why are they called Abrahamic?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#where-does-the-term-abrahamic-religions-come-from">Where does the term "Abrahamic religions" come from?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-are-the-three-abrahamic-religions">What are the three Abrahamic religions?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-is-abrahamism">What is Abrahamism?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#is-islam-an-abrahamic-religion">Is Islam an Abrahamic religion?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#which-abrahamic-religion-came-first">Which Abrahamic religion came first?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-do-the-abrahamic-religions-view-abraham">How do the Abrahamic religions view Abraham?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#do-the-abrahamic-religions-share-the-same-values">Do the Abrahamic religions share the same values?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#who-are-the-prophets-of-the-abrahamic-religions">Who are the prophets of the Abrahamic religions?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#why-are-they-called-western-religions">Why are the Abrahamic religions sometimes called Western religions?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#is-mandaeism-an-abrahamic-religion">Is Mandaeism an Abrahamic religion?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#do-they-worship-the-same-god">Do the four traditions worship the same God?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-does-the-word-allah-mean">What does the word "Allah" mean?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-is-the-difference-between-the-torah-and-the-tanakh">What is the difference between the Torah and the Tanakh?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#do-muslims-believe-in-jesus">Do Muslims believe in Jesus?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-do-christians-understand-the-trinity">How do Christians understand the Trinity?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#why-is-jerusalem-important">Why is Jerusalem important to Jews, Christians and Muslims?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-does-islam-regard-the-other-traditions">How does Islam regard the other Abrahamic traditions?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#which-is-the-largest-abrahamic-religion">Which is the largest Abrahamic religion?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-percentage-of-the-world-is-abrahamic">What percentage of the world follows an Abrahamic religion?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-are-the-major-religions-of-the-world">What are the major religions of the world?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#which-religions-began-in-the-middle-east">Where did the Abrahamic religions originate?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-do-judaism-christianity-and-islam-have-in-common">What do Judaism, Christianity and Islam have in common?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-are-the-main-differences-between-judaism-christianity-and-islam">What are the main differences between Judaism, Christianity and Islam?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-is-the-difference-between-judaism-and-christianity">What is the difference between Judaism and Christianity?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-are-judaism-and-islam-similar">How are Judaism and Islam similar?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#are-jews-muslims">Are Jews Muslims?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-is-the-islamic-dilemma">What is the Islamic Dilemma?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-can-i-suggest-a-correction">How can I suggest a correction?</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"what-are-the-abrahamic-religions"} -->
<h2 class="wp-block-heading" id="what-are-the-abrahamic-religions">The FAQ: what are the Abrahamic religions?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Abrahamic religions, also called the Abrahamic faiths, are the religious traditions that trace a spiritual or historical connection to Abraham: <a href="/religions/judaism/">Judaism</a>, Mandaeism, <a href="/religions/christianity/">Christianity</a> and Islam. Judaism, Christianity and Islam, the three great monotheistic religions, are by far the largest; Mandaeism is the smallest. See <a href="/religions/">Religions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"why-are-they-called-abrahamic"} -->
<h2 class="wp-block-heading" id="why-are-they-called-abrahamic">Why are they called Abrahamic?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Each tradition looks back to Abraham as a founding figure: the father of the Jewish people, the model of faith for Christians, and a prophet and pure monotheist for Muslims. See <a href="/journal/who-was-abraham/">Who Was Abraham?</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"where-does-the-term-abrahamic-religions-come-from"} -->
<h2 class="wp-block-heading" id="where-does-the-term-abrahamic-religions-come-from">Where does the term "Abrahamic religions" come from?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The phrase is modern. Until the middle of the twentieth century, Abraham was invoked in argument between the communities, each claiming to be the rightful heir of the promise made to him; the sense in which he stands for shared ground belongs to the decades after the Second World War, and spread further after 2001. The grouping is a convenience of recent scholarship and dialogue, and its boundaries are disputed. <a href="/reference/comparisons/">Comparative studies</a> sets this out.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-are-the-three-abrahamic-religions"} -->
<h2 class="wp-block-heading" id="what-are-the-three-abrahamic-religions">What are the three Abrahamic religions?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The three Abrahamic religions usually named are Judaism, Christianity and Islam, the three monotheistic faiths that look to Abraham as their forefather. Abrahamic Religions also treats Mandaeism, a small tradition of Iraq and Iran that shares the prophets before Abraham, as a fourth type of Abrahamic religion, for the reasons given below. All four are set out on the <a href="/religions/">Religions</a> page.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-is-abrahamism"} -->
<h2 class="wp-block-heading" id="what-is-abrahamism">What is Abrahamism?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abrahamism is an informal name, found mostly online and in some languages other than English, for the Abrahamic religions taken together, or for the belief they share: that the one God made himself known to Abraham and his descendants. Scholars prefer to speak of the Abrahamic religions or the Abrahamic traditions, and no community calls itself Abrahamist.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"is-islam-an-abrahamic-religion"} -->
<h2 class="wp-block-heading" id="is-islam-an-abrahamic-religion">Is Islam an Abrahamic religion?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Yes, and in the most direct sense. The Qur’an calls Abraham neither a Jew nor a Christian but a <em>ḥanīf</em> (<span lang="ar" dir="rtl">حَنِيف</span>, one inclining to the truth) and a <em>muslim</em> (<span lang="ar" dir="rtl">مُسْلِم</span>, one who submits to God), and commands the Prophet to follow the religion of Abraham (<a href="https://quran.com/3/67">Qur’an 3:67</a>; 16:123). It records Abraham and Ishmael raising the foundations of the Kaaba in Makkah (2:127), and Muslims ask blessings on Abraham in every daily prayer. Islam understands itself as the religion of Abraham restored. See <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur’an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"which-abrahamic-religion-came-first"} -->
<h2 class="wp-block-heading" id="which-abrahamic-religion-came-first">Which Abrahamic religion came first?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>As a continuous tradition, Judaism is the oldest: the religion of ancient Israel took shape in the first millennium BCE, and rabbinic Judaism after the destruction of the Second Temple in 70 CE. Christianity arose in the first century CE and Islam in the seventh; the origins of Mandaeism are debated, with most scholars placing them in the first centuries CE. Islam answers the question differently. It holds that the religion God has always asked of humanity is <em>islām</em> (<span lang="ar" dir="rtl">إِسْلَام</span>, submission to God), taught by every prophet from Adam and followed by Abraham, so that the first religion and the last are the same (Qur’an 3:19; 3:67). See the <a href="/reference/timeline/">Timeline</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-do-the-abrahamic-religions-view-abraham"} -->
<h2 class="wp-block-heading" id="how-do-the-abrahamic-religions-view-abraham">How do the Abrahamic religions view Abraham?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism, Christianity and Islam all honour Abraham, in Hebrew <em>Avraham</em> (<span lang="he" dir="rtl">אַבְרָהָם</span>) and in Arabic <em>Ibrāhīm</em> (<span lang="ar" dir="rtl">إِبْرَاهِيم</span>), as the man whom God called and with whom He made a covenant. For Jews he is the father of the nation and the first to enter the covenant, whose name God changed to mark him as the father of many nations (Genesis 17:5).</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Christians look to him as the model of faith and the spiritual father of all who believe (Galatians 3:7). Muslims honour him as a prophet, the leader God made for mankind, and <em>Khalīl Allāh</em> (<span lang="ar" dir="rtl">خَلِيل ٱللَّه</span>, the intimate friend of God), whose religion Muslims are commanded to follow (Qur’an 2:124; 4:125). Mandaeism, alone of the four, does not accept him as a prophet. See <a href="/journal/who-was-abraham/">Who was Abraham?</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"do-the-abrahamic-religions-share-the-same-values"} -->
<h2 class="wp-block-heading" id="do-the-abrahamic-religions-share-the-same-values">Do the Abrahamic religions share the same values?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In large part. All four teach that human beings are answerable to one God, and they share commands to worship Him, to be just, to care for the poor, the orphan and the stranger, and to speak truthfully. Those shared commitments have long served as common ground for dialogue between the communities; see <a href="/journal/amman-message-and-a-common-word/">The Amman Message and A Common Word</a>. They differ on what God has revealed and how He is to be obeyed, and honest dialogue names those differences openly.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"who-are-the-prophets-of-the-abrahamic-religions"} -->
<h2 class="wp-block-heading" id="who-are-the-prophets-of-the-abrahamic-religions">Who are the prophets of the Abrahamic religions?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All four traditions hold that God has spoken to humanity through prophets, and they share many of the same names: Adam, Noah and, for three of them, Abraham, Moses, David and Solomon. Judaism honours the prophets of the Hebrew Bible and holds that prophecy ended with the last of them. Christianity reads those prophets as foretelling Jesus, whom it regards as more than a prophet. Islam honours every prophet from Adam onwards, Jesus among them, and holds that Muhammad is the seal of the prophets (Qur’an 33:40). Mandaeism honours Adam, Seth, Noah, Shem and John the Baptist, and rejects Abraham, Moses, Jesus and Muhammad as prophets. See <a href="/reference/figures/">Figures</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"why-are-they-called-western-religions"} -->
<h2 class="wp-block-heading" id="why-are-they-called-western-religions">Why are the Abrahamic religions sometimes called Western religions?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Because Christianity shaped the history and culture of Europe and the Americas, and Judaism and Islam were long present there, older textbooks grouped the three as the "Western" religions, in contrast with the "Eastern" religions of India and East Asia. The label is misleading. All four Abrahamic religions began in the Middle East, and most of their followers now live outside the West: by 2020 more Christians lived in sub-Saharan Africa than in Europe, and most Muslims live in Asia. See <a href="/journal/population-of-abrahamic-religions/">The population of the Abrahamic religions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"is-mandaeism-an-abrahamic-religion"} -->
<h2 class="wp-block-heading" id="is-mandaeism-an-abrahamic-religion">Is Mandaeism an Abrahamic religion?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeans share the prophetic line from Adam through Noah and Shem with the other traditions, come from the same Aramaic world of late antiquity, and have been recognised since the seventh century as the Sabians named in the <a href="/reference/sacred-texts/quran/">Qur'an</a> beside Jews and Christians. They do not accept Abraham, <a href="/reference/figures/#moses">Moses</a>, Jesus or Muhammad as prophets, and scholars more often classify the religion as Gnostic. Both points are set out on the <a href="/religions/mandaeism/">Mandaeism</a> page.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"do-they-worship-the-same-god"} -->
<h2 class="wp-block-heading" id="do-they-worship-the-same-god">Do the four traditions worship the same God?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All four affirm one God. Jews, Christians and Muslims each understand themselves to worship the God of Abraham, sometimes called the Abrahamic God, and Arabic-speaking Jews and Christians, like Muslims, call God Allah. Mandaeans call God Hayyi Rabbi, the Great Life, and set the World of Light against a World of Darkness, a dualism the other three do not share. Beyond that each describes God differently, and believers and theologians disagree about how far their understandings coincide. See <a href="/journal/abrahamic-monotheism/">How the Abrahamic Religions Understand Monotheism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-does-the-word-allah-mean"} -->
<h2 class="wp-block-heading" id="what-does-the-word-allah-mean">What does the word "Allah" mean?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><em>Allāh</em> (<span lang="ar" dir="rtl">الله</span>, God) is the Arabic word for God. Arabic-speaking Christians and Jews use it as well as Muslims.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-is-the-difference-between-the-torah-and-the-tanakh"} -->
<h2 class="wp-block-heading" id="what-is-the-difference-between-the-torah-and-the-tanakh">What is the difference between the Torah and the Tanakh?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Torah is the first part of the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a>, the five books of Moses. The Tanakh is the whole Hebrew Bible: Torah, Prophets and Writings. See <a href="/reference/sacred-texts/">Sacred texts</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"do-muslims-believe-in-jesus"} -->
<h2 class="wp-block-heading" id="do-muslims-believe-in-jesus">Do Muslims believe in Jesus?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Yes. Muslims honour Jesus, called ʿĪsā in Arabic, as the Messiah and one of the greatest prophets, born of the Virgin Mary. They do not regard him as divine or as crucified. See <a href="/reference/figures/#jesus">Figures</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-do-christians-understand-the-trinity"} -->
<h2 class="wp-block-heading" id="how-do-christians-understand-the-trinity">How do Christians understand the Trinity?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christians believe in one God who exists eternally as three persons: Father, Son and Holy Spirit. The doctrine was defined at church councils in the fourth century.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"why-is-jerusalem-important"} -->
<h2 class="wp-block-heading" id="why-is-jerusalem-important">Why is Jerusalem important to Jews, Christians and Muslims?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jerusalem was the site of the Jewish Temple, the place of Jesus' crucifixion and, Christians believe, his resurrection, and the site of the Dome of the Rock and al-Aqṣā Mosque, associated with the Prophet's Night Journey. Mandaean tradition remembers it as the city its forebears left. See <a href="/journal/jerusalem-in-three-traditions/">Jerusalem in Three Traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-does-islam-regard-the-other-traditions"} -->
<h2 class="wp-block-heading" id="how-does-islam-regard-the-other-traditions">How does Islam regard the other Abrahamic traditions?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur'an names the Torah and the Gospel as revelations from God, counts Moses, <a href="/reference/figures/#david">David</a>, John and Jesus among the prophets, and promises reward to the Jews, the Christians and the Sabians who believe in God and the Last Day and do good. Muslims honour Mary, and a Muslim cannot deny any of the earlier prophets and remain a Muslim. <a href="/religions/islam/">Islam</a> understands the Qur'an as the final revelation, confirming what came before it and restoring the monotheism of Abraham. Under Muslim rule these communities kept their worship as protected peoples, which is how the small Mandaean community survived to the present.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"which-is-the-largest-abrahamic-religion"} -->
<h2 class="wp-block-heading" id="which-is-the-largest-abrahamic-religion">Which is the largest Abrahamic religion?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christianity, the biggest religion in the world, with about 2.3 billion followers in 2020, or 28.8% of the world’s population, according to the Pew Research Center’s 2025 study of more than 2,700 censuses and surveys. Islam is second, with about 2.0 billion, or 25.6%, and it was the fastest-growing religion of the decade: the number of Muslims rose by 347 million between 2010 and 2020, more than all other religions combined. Judaism counted 14.8 million people, about 0.2%. See <a href="/journal/population-of-abrahamic-religions/">The population of the Abrahamic religions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-percentage-of-the-world-is-abrahamic"} -->
<h2 class="wp-block-heading" id="what-percentage-of-the-world-is-abrahamic">What percentage of the world follows an Abrahamic religion?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>More than half. On the Pew Research Center’s 2020 figures, Christians (28.8%), Muslims (25.6%) and Jews (0.2%) together make up about 54.6% of humanity, some 4.3 billion people. Mandaeans are too few to change the total. See <a href="/journal/population-of-abrahamic-religions/">The population of the Abrahamic religions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-are-the-major-religions-of-the-world"} -->
<h2 class="wp-block-heading" id="what-are-the-major-religions-of-the-world">What are the major religions of the world?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Pew Research Center groups the world’s population into seven categories. In 2020 they were Christians (28.8%), Muslims (25.6%), the religiously unaffiliated (24.2%), Hindus (14.9%), Buddhists (4.1%), followers of other religions (2.2%) and Jews (0.2%). Scholars often sort the religions into families: the Abrahamic religions of the Middle East; the religions of India, among them Hinduism, Buddhism, Jainism and Sikhism; and the traditions of East Asia, among them Confucianism, Taoism and Shinto. The Abrahamic family is the largest of the three.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"which-religions-began-in-the-middle-east"} -->
<h2 class="wp-block-heading" id="which-religions-began-in-the-middle-east">Where did the Abrahamic religions originate?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All four Abrahamic religions originated in the Middle East: Judaism started in the land of Israel, Christianity in Roman Judaea and Galilee, Islam in Makkah and Madinah in Arabia, and Mandaeism in the river country of Mesopotamia. Zoroastrianism, the ancient religion of Iran, also belongs to the region. See <a href="/reference/places/">Places</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-do-judaism-christianity-and-islam-have-in-common"} -->
<h2 class="wp-block-heading" id="what-do-judaism-christianity-and-islam-have-in-common">What do Judaism, Christianity and Islam have in common?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All three worship one God, look to Abraham as their forefather, honour Moses and the prophets, hold that God has spoken through revealed scripture, and expect a final judgement. All three teach prayer, charity and fasting, and a moral law drawn from revelation. Each pair also shares something the third does not: Judaism and Christianity the Hebrew Bible, Christianity and Islam the honour given to Jesus as Messiah, and Judaism and Islam an undivided God and a religious law for daily life. The Venn diagram below shows the shared ground; <a href="/journal/abrahamic-family-tree/">The Abrahamic family tree</a> explains it.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_diagram name="shared-beliefs" caption="A Venn diagram of the beliefs shared by Judaism, Mandaeism, Christianity and Islam, simplified. The full discussion is in The Abrahamic family tree and what the traditions share."]
<!-- /wp:shortcode -->

<!-- wp:heading {"anchor":"what-are-the-main-differences-between-judaism-christianity-and-islam"} -->
<h2 class="wp-block-heading" id="what-are-the-main-differences-between-judaism-christianity-and-islam">What are the main differences between Judaism, Christianity and Islam?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>They differ above all on God and on Jesus. Judaism and Islam hold that God is one without division; Christianity confesses one God in three persons. Judaism does not accept Jesus as the Messiah; Christianity worships him as the Son of God; Islam honours him as the Messiah and a prophet, born of a virgin, and denies that he is divine. They also differ on the last word of revelation: the Torah with its rabbinic interpretation, the New Testament, or the Qur’an. <a href="/reference/comparisons/">Comparative studies</a> compares them point by point.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-is-the-difference-between-judaism-and-christianity"} -->
<h2 class="wp-block-heading" id="what-is-the-difference-between-judaism-and-christianity">What is the difference between Judaism and Christianity?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christianity began as a movement within Judaism and keeps the Hebrew Bible as its Old Testament, but the two part on Jesus. Christians believe him to be the Messiah and the Son of God, whose death and resurrection opened the covenant to all nations; Jews await a Messiah still to come and do not regard any human being as divine. Judaism lives by the commandments of the Torah as the rabbis interpreted them, while most Christian churches hold that the ritual law was fulfilled in Christ.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-are-judaism-and-islam-similar"} -->
<h2 class="wp-block-heading" id="how-are-judaism-and-islam-similar">How are Judaism and Islam similar?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>More closely than either is to Christianity in some respects. Both hold that God is strictly one, with no incarnation and no division; both are religions of law, with a detailed code for daily life (<em>halakhah</em> in Judaism, <em>sharīʿah</em> in Islam) covering prayer, diet and circumcision; and both forbid images in worship. Their scriptures are written in two sister Semitic languages, Hebrew and Arabic, and both trace their people to Abraham, through Isaac and Ishmael.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"are-jews-muslims"} -->
<h2 class="wp-block-heading" id="are-jews-muslims">Are Jews Muslims?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>No. Judaism and Islam are distinct religions with their own scriptures, law and communities. The Arabic word <em>muslim</em>, however, means one who submits to God, and the Qur’an uses it in that sense of earlier believers, including Abraham and the prophets of Israel who judged by the Torah (Qur’an 3:67; 5:44).</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-is-the-islamic-dilemma"} -->
<h2 class="wp-block-heading" id="what-is-the-islamic-dilemma">What is the Islamic Dilemma?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>An argument made by Christian apologists, popularised by David Wood: that the Qur’an affirms the Torah and the Gospel, so that Islam is false whether those scriptures are reliable or corrupted. Muslim scholars answer that the Qur’an confirms earlier revelation as its guardian and criterion (Qur’an 5:48), and itself speaks of alteration in the texts of its time. See <a href="/reference/comparisons/islamic-dilemma/">What is the Islamic Dilemma?</a> and <a href="/journal/the-islamic-dilemma/">The Islamic Dilemma: the argument and the answer</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-can-i-suggest-a-correction"} -->
<h2 class="wp-block-heading" id="how-can-i-suggest-a-correction">How can I suggest a correction?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Use the <a href="/about/contact/">Contact</a> page. The <a href="/about/editorial-policy/">Editorial policy</a> explains how corrections are handled.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:topics', 'photo' => array( 'name' => 'page-topics', 'alt' => 'Topics on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'topics', 'title' => 'Topics', 'parent' => 'page:articles',
			'excerpt' => 'Browse articles on Abrahamic Religions by topic, from history and scripture to philosophy and interfaith studies.', 'description' => 'Browse the Journal by topics: history, scripture, theology, philosophy, culture and more. Find your subject here.', 'menu_order' => 23, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">On this page</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#browsing-by-topics">Browsing by topics</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-the-subjects-are-chosen">How the subjects are chosen</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"browsing-by-topics"} -->
<h2 class="wp-block-heading" id="browsing-by-topics">Browsing by topics</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The topics below gather the Journal’s articles by subject: history, scripture, theology, philosophy, culture, archaeology, religion and interfaith studies. Each opens a page listing every article filed under it, newest first, with a short introduction to the subject. Articles may sit under more than one subject, and each also carries tags for the traditions, figures and places it discusses, so the same essay can be found by several routes. Start with <a href="/journal/">the Journal</a> to see everything at once.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-the-subjects-are-chosen"} -->
<h2 class="wp-block-heading" id="how-the-subjects-are-chosen">How the subjects are chosen</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The subjects follow the questions readers bring to the site: what the scriptures say, what happened and when, how the traditions think about God, and how their followers live.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Articles are grouped by subject, from archaeology and history to scripture and theology. Choose a topic to see its articles.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_topic_index]
<!-- /wp:shortcode -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://quran.com/">The Qur’an (Quran.com)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:site-map', 'photo' => array( 'name' => 'page-site-map', 'alt' => 'The sitemap on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'sitemap', 'title' => 'Sitemap', 'parent' => '',
			'excerpt' => 'A complete, organised list of the pages and articles on Abrahamic Religions.', 'description' => 'Every page and article on Abrahamic Religions, organised by subject. Use the sitemap to find your way.', 'menu_order' => 24, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">On this page</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#about-this-sitemap">About this sitemap</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#other-ways-to-find-a-page">Other ways to find a page</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"about-this-sitemap"} -->
<h2 class="wp-block-heading" id="about-this-sitemap">About this sitemap</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This page lists every page and article on the site, grouped by section, so that any page can be found in one click. It begins with the four religions and the reference guides, continues with the Journal and its topics, and ends with the pages about the site itself. The list updates itself whenever a page or article is published, so it is always complete. Search engines read a separate machine-readable version, linked from the site’s robots file. Readers looking for a subject can also use the <a href="/journal/topics/">topics</a> or the search box at the top of every page.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"other-ways-to-find-a-page"} -->
<h2 class="wp-block-heading" id="other-ways-to-find-a-page">Other ways to find a page</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Readers can also search the whole site from the box at the top of every page, browse the Journal by subject, or follow the tags at the foot of each article to related essays.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Every section of Abrahamic Religions, organised by subject.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_site_map]
<!-- /wp:shortcode -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://www.sitemaps.org/">Sitemaps.org</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:donate', 'photo' => array( 'name' => 'page-donate', 'alt' => 'Donate on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'donate', 'title' => 'Donate', 'parent' => '',
			'excerpt' => 'Support Abrahamic Religions and help keep its reference pages and Journal free to read.', 'description' => 'Donate to Abrahamic Religions and keep it free to read, with no advertising. Make a gift today.', 'menu_order' => 25, 'special' => '', 'since' => 7,
			'content' => <<<'ABR_SEED'
<!-- wp:heading {"anchor":"why-donate"} -->
<h2 class="wp-block-heading" id="why-donate">Why donate</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abrahamic Religions is free to read and carries no advertising. When you give, you help pay for the research, writing and hosting that keep it so: the sources that must be bought or consulted, the checking of every citation, and the photographs licensed for each article. Every gift, however small, is used for the site and nothing else. You can donate once, or return whenever you wish, and no account is needed. Readers who cannot give money can help by sharing articles and by sending corrections through the <a href="/about/contact/">contact page</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#why-donate">Why donate</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#give">Give</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#other-ways-to-help">Other ways to help</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Abrahamic Religions is free to read. Contributions from readers pay for the research and writing behind each page and keep the site online and secure.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"give"} -->
<h2 class="wp-block-heading" id="give">Give</h2>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[abr_donation]
<!-- /wp:shortcode -->

<!-- wp:heading {"anchor":"other-ways-to-help"} -->
<h2 class="wp-block-heading" id="other-ways-to-help">Other ways to help</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sharing a page you found useful, or telling us about an error through the <a href="/about/contact/">Contact</a> page, helps keep the material accurate.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://www.paypal.com/">PayPal</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:dmca', 'photo' => array( 'name' => 'page-dmca', 'alt' => 'The DMCA on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'dmca', 'title' => 'Copyright and DMCA', 'parent' => '',
			'excerpt' => 'How to report copyright infringement on Abrahamic Religions, and what happens after a notice.', 'description' => 'How to report copyright infringement on Abrahamic Religions and what follows a notice. Read the DMCA procedure.', 'menu_order' => 26, 'special' => '', 'since' => 8,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>This page sets out how to send a DMCA notice and credits every photograph the site uses. Abrahamic Religions respects the rights of copyright owners. If any content infringes your copyright, the procedure below sets out how to tell us.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#notice-of-infringement">The DMCA: notice of infringement</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-happens-next">What happens next</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-caution">A caution</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#photograph-credits">Photograph credits</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Sea of Galilee: Marta Nogueira, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/detail-of-rocky-shore-of-sea-of-galilee-in-israel-water-and-blue-sky-landscape-with-hills-in-the-background-20172580/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Safed: Mark Direen, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/scenic-view-of-safed-s-historic-architecture-33924953/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Masada: Svet Svet, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/tourists-exploring-ancient-masada-with-desert-views-39882562/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Chora and the Monastery of St John, Patmos: K, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/aerial-view-of-patmos-island-with-historical-architecture-37844621/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A monastery of Mount Athos: My Photos, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/a-building-near-the-sea-7758941/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The bell towers of Santiago de Compostela: Luis Miguel Bugallo Sánchez, <a href="https://creativecommons.org/licenses/by-sa/4.0/" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:2026._Campás_do_Obradoiro._Santiago_de_Compostela._Galiza.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Qibli Mosque, Masjid al-Aqsa: Yasir Gürbüz, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/al-aqsa-mosque-facade-in-jerusalem-11659894/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Mount Uhud at night: Yasir Gürbüz, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/mount-uhud-at-night-medina-saudi-arabia-12607980/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Great Mosque of Kairouan: Keith Roper, <a href="https://creativecommons.org/licenses/by/2.0/" rel="license">CC BY 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Courtyard_and_minaret_of_the_Great_Mosque_of_Kairouan,_Tunisia.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Tigris at Baghdad: Muhammad Nabeel, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/aerial-view-of-baghdad-cityscape-over-tigris-river-33047484/">Pexels</a>.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"notice-of-infringement"} -->
<h2 class="wp-block-heading" id="notice-of-infringement">The DMCA: notice of infringement</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Under the Digital Millennium Copyright Act, Title 17 of the United States Code, section 512, a copyright owner or an authorised agent may send a takedown notice. Send it through the <a href="/about/contact/">Contact</a> page, and include the following.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li>A physical or electronic signature of the copyright owner, or of a person authorised to act for the owner.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Identification of the copyrighted work said to be infringed.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Identification of the material to be removed, with the address of the page in question, so that we can find it.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Contact details sufficient for us to reach you, including a name, address and email address.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A statement that you believe in good faith that the use is not authorised by the copyright owner, its agent or the law.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A statement, made under penalty of perjury, that the information in the notice is accurate and that you are authorised to act for the copyright owner.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"what-happens-next"} -->
<h2 class="wp-block-heading" id="what-happens-next">What happens next</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We review each notice and remove or disable access to material that appears to infringe, and we tell the person who posted it. Anyone who believes material was removed in error may send a counter-notice containing the same categories of information.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-caution"} -->
<h2 class="wp-block-heading" id="a-caution">A caution</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Anyone who knowingly misrepresents that material is infringing may be liable for damages, including costs and legal fees, under section 512(f).</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"photograph-credits"} -->
<h2 class="wp-block-heading" id="photograph-credits">Photograph credits</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Photographs not credited below come from Abrahamic Religions' own collection. The images below, and the drawing of the darfash, come from Wikimedia Commons and appear under the licence named beside each one. Each has been cropped and resized for the theme; images under a ShareAlike licence remain available on the same terms.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li>The darfash drawing on the Mandaeism page and its card: Dragovit, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Darfash_-_Mandaean_cross.svg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Mandaean baptism on the Karun River, group: Mehdi Pedramkhoo, <a href="https://creativecommons.org/licenses/by/4.0" rel="license">CC BY 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Masbuta_by_Mandaeans_in_Karun_River,_Ahvaz,_Iran_-_17_July_2018_(04).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Great Hypostyle Hall, Karnak: Tsyganov Sergey, <a href="http://creativecommons.org/publicdomain/zero/1.0/deed.en" rel="license">CC0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Karnak_Temple_Great_Hypostyle_Hall_2014.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Mount Sinai: Tamerlan, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Mount_Sinai_Egypt.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Mandaean baptism in the Karun River: Mehdi Pedramkhoo, <a href="https://creativecommons.org/licenses/by/4.0" rel="license">CC BY 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Masbuta_by_Mandaean_in_Karun_River,_Ahvaz,_Iran_-_16_July_2018_(01).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Leningrad Codex, folio 8a: Unknown scribe; scan by USC Dornsife, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Leningrad_Codex_Folio_008a.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Codex Alexandrinus, Gospel of Mark: Unknown scribe, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Codex_Alexandrinus_013a_Mc_6,27-54.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Great Isaiah Scroll: Unknown scribe; photograph by Ardon Bar Hama, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Great_Isaiah_Scroll_Ch53.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The ziggurat of Ur: Hardnfast, <a href="https://creativecommons.org/licenses/by/3.0" rel="license">CC BY 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Ancient_ziggurat_at_Ali_Air_Base_Iraq_2005.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Tel Megiddo from the air: AVRAMGR, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:TEL_MEGIDO_AERIAL_A.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Great Mosque of Córdoba: Benjamin Smith, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:C%C3%B3rdoba_-_Mezquita-Catedral_-_Interior_-_10.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Jordan River at Qasr al-Yahud: Fallaner, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Holy_Land_2016_P0577_Jordan_River_Kasr_al-Jahud_site_of_the_baptism_of_Jesus.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Birmingham Qur'an manuscript: Unknown scribe, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Birmingham_Quran_manuscript.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Marid Castle, Dumat al-Jandal: Richard Mortel, <a href="https://creativecommons.org/licenses/by/2.0" rel="license">CC BY 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Marid_Castle,_Dumat_al-Jandal,_Saudi_Arabia,_ca._1st_cent._CE_(2).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Aleppo Codex, the Ten Commandments: J. Segall, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Aleppo_Codex,_The_Ten_Commandments_in_Deuteronomy.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Jerusalem from the Mount of Olives: Daniel Case, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Jerusalem_panorama_from_Mount_of_Olives.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Abraham's Oak, near Hebron: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Abraham%27s_tree_Mamreh,_Hebron,_Holy_Land,_(i.e.,_West_Bank)-LCCN2002724988.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The excavated site of ancient Beersheba: Oren Rozen, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Tel_Be%27er_Sheva_181225_06.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Merneptah Stele, Cairo: Webscribe, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Merenptah_Israel_Stele_Cairo.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Lachish Relief, British Museum: Photograph by Mike Peel (www.mikepeel.net)., <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Lachish_Relief,_British_Museum_4.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Umayyad Mosque, Damascus: Bernard Gagnon, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Umayyad_Mosque,_Damascus.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The caves near Qumran: Hoshvilim, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Qumran,_Dead_Sea,_Palestine_42.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Papyrus 52, John Rylands Library: RylandsImaging, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:JRL19060215_(cropped).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Treasury at Petra: Ywpark2003 Prof. Yong Woo Park, <a href="https://creativecommons.org/licenses/by/4.0" rel="license">CC BY 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Al-Khazneh_Treasury_Rock-cut_Facade_at_Petra_Jordan.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Assyrian relief of Arab riders, British Museum: Anthony Huan, <a href="https://creativecommons.org/licenses/by-sa/2.0" rel="license">CC BY-SA 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Assyrians_pursue_Arabs_on_camelback._Ashurbanipal,_North_Palace_of_Nineveh._660-650_BCE.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The former School of Translators, Toledo: لا روسا, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Escuela_de_Traductores001.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Arabic manuscript of Aristotle's Organon: public domain, via <a href="https://commons.wikimedia.org/wiki/File:AR_Organon_2346.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A mihrab in Isfahan, Iran: 16th century Iranian Architectures, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Mihrab_(Prayer_Niche_)_in_Isfahan,_Iran.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Worshippers at the Western Wall, Jerusalem: Askii, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Prayers_at_the_Western_Wall_2.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Exterior of the Dome of the Rock, Jerusalem: Diego Delso, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Exterior_of_the_Dome_of_the_Rock,_Jerusalem7.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A synagogue Torah ark: Elyane ferrari, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Torah_ark_of_Synagogue_de_Thann.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A triquetra symbol: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Triquetra-circle-interlaced.png">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Jabal al-Nour, near Makkah: Kaliper1, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Jabbal_An-Nour_(2024).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Canterbury Cathedral: ECetc Church Photos, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Canterbury_Cathedral,_Kent_(exterior).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Memorial statue of Ibn Rushd (Averroes), Córdoba: Saleemzohaib, <a href="https://creativecommons.org/licenses/by/3.0" rel="license">CC BY 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Statue_of_Averroes_in_C%C3%B3rdoba,_Spain.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The House of the Virgin Mary, near Ephesus: No machine-readable author provided. Mfryc assumed (based on copyright claims)., <a href="https://creativecommons.org/licenses/by-sa/2.5" rel="license">CC BY-SA 2.5</a>, via <a href="https://commons.wikimedia.org/wiki/File:House_of_the_Virgin_Mary.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Ruins at Harran, Turkey: Zorka Sojka, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Turecko_Harran_(13)_me%C5%A1ita.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Church of the Holy Sepulchre, Jerusalem: Berthold Werner, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Jerusalem_Holy_Sepulchre_BW_22.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Myrtle (Myrtus communis): Roger Culos, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Myrtus_communis_MHNT.BOT.2007.40.51.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Statue of Ramesses II, Museo Egizio, Turin: Unknown authorUnknown author, <a href="http://creativecommons.org/publicdomain/zero/1.0/deed.en" rel="license">CC0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Statue_of_Ramesses_II,_granodiorite_-_Museo_Egizio_(Turin)_C_1380_p05.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Egyptian scarab amulet, Walters Art Museum: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Egyptian_-_Scarab_Amulet_-_Walters_4216_-_Bottom.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Cambridge University Library: Sebastian Ballard, <a href="https://creativecommons.org/licenses/by-sa/2.0" rel="license">CC BY-SA 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Cambridge_University_Library_-_geograph.org.uk_-_712521.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Sea of Galilee: אילנה שקולניק ilana shkolnik, <a href="https://creativecommons.org/licenses/by/2.5" rel="license">CC BY 2.5</a>, via <a href="https://commons.wikimedia.org/wiki/File:PikiWiki_Israel_1755_Lake_Kinneret_Sea_of_Galilee_%D7%9B%D7%A0%D7%A8%D7%AA.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Manger Square, Bethlehem: Alexey Goral, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Manger_Square.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A page of Genesis, Aleppo Codex: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Aleppo_Codex_Genesis.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The courtyard of al-Azhar Mosque, Cairo: Radosław Botev, <a href="https://creativecommons.org/licenses/by/3.0/pl/deed.en" rel="license">CC BY 3.0 pl</a>, via <a href="https://commons.wikimedia.org/wiki/File:Courtyard_of_Al-Azhar_Mosque_Cairo_Egypt_2019_(1).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A legal document from the Cairo Genizah: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Fragment_of_the_Cairo_Genizah_-_Legal_document_T-S_8J5.5.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Basilica of the Annunciation, Nazareth: Hoshvilim, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Basilica_of_the_Annunciation,_Nazareth,_Israel_11.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A page of the Codex Sinaiticus: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Codex_Sinaiticus_Matthew_1,1-2,5.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Latin manuscript of a commentary on Aristotle: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Bnf_lat16151_f22.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Aerial view of the Karun River, Ahvaz: public domain, via <a href="https://commons.wikimedia.org/wiki/File:ISS067-E-1160_-_View_of_Iran-_Ahvaz_-_Karun_River_-_Shadegan_Ponds_(cropped).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Sea of Galilee from the Mount of Beatitudes: Bahnfrend, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:View_of_Capernaum_from_the_Mount_of_Beatitudes,_2019_(01).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The King Abdullah I Mosque, Amman: Diego Delso, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:King_Abdullah_I_Mosque,_Amman,_Jordan3.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>World Council of Churches headquarters, Geneva: MHM55, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:World_Council_of_Churches_Headquarters-01.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A page of Thomas Aquinas' Summa theologiae: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Basel,_Universit%C3%A4tsbibliothek,_A_I_14,_f._149v_%E2%80%93_Thomas_Aquinas,_Summa_theologiae_(prima_pars.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Diagram of lunar phases, from a manuscript of al-Biruni’s Kitab al-Tafhim: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Lunar_phases_al-Biruni.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The obelisk and pylon of the Luxor Temple: Ad Meskens, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Luxor_temple_entrance.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Columns of the Hypostyle Hall, Karnak: David Broad, <a href="https://creativecommons.org/licenses/by/3.0" rel="license">CC BY 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Amun-Re_Hypostyle_Hall_at_Karnak,_Luxor,_Egypt_-_panoramio.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Ruins at Persepolis: Paul, <a href="https://creativecommons.org/licenses/by-sa/2.0" rel="license">CC BY-SA 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Ruins_of_Persepolis_6.jpeg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Lagos, Nigeria, skyline: Clara Sanchiz, <a href="https://creativecommons.org/licenses/by-sa/2.0" rel="license">CC BY-SA 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Lagos_skyline.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Istiqlal Mosque and the Jakarta skyline: JS Barry, <a href="https://creativecommons.org/licenses/by/3.0" rel="license">CC BY 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Istiqal_Mosque_view_from_Menara_BTN_-_panoramio.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>World population density map, 2020: Petnog, <a href="https://creativecommons.org/licenses/by/4.0" rel="license">CC BY 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:World_Population_Density_Map_2020.png">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Antakya (ancient Antioch), Turkey: Maarten Sepp, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Antakya_-_2011-04-10.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Chester Beatty papyrus of Paul’s letters: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Dublin,_Chester_Beatty_Ms_BP_II_fol._15%2690_Bifolio_from_Paul%27s_Letter_to_the_Romans,_the_end_of_Paul%27s_Letter_to_the_Philippians_and_the_beginning_of_Paul%27s_Letter_to_the_Colossians.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Ruins of ancient Corinth, with the Temple of Apollo and Acrocorinth: Nicholas Hartmann, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:2007_Greece_Acrocorinth_%26_Apollo_Temple.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A page of the Vilna Talmud: public domain, via <a href="https://commons.wikimedia.org/wiki/File:VilniusShasPage.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Opening of the Second Vatican Council, St Peter’s Square: Peter Geymayer, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Konzilseroeffnung_1.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Palace of Justice, Putrajaya: Wolfiewhite, <a href="http://creativecommons.org/publicdomain/zero/1.0/deed.en" rel="license">CC0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Angled_view_of_the_front_of_Palace_of_Justice,_Putrajaya.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The old town and castle of Harran: Hamdigumus, <a href="http://creativecommons.org/publicdomain/zero/1.0/deed.en" rel="license">CC0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Harran_Kalesi_2015.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Ophiuchus, from a manuscript of al-Ṣūfī’s treatise on the fixed stars: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Ophiuchus_-_miniature_from_the_%22Kit%C4%81b_%E1%B9%A3uwar_al-kaw%C4%81kib_al-%E1%B9%AF%C4%81bita%22.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Planispheric astrolabe, Iran, 984 CE, Museum of Islamic Art, Doha: Ciphers, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:MIA_-_Planispheric_Astrolabe,_Iran,_984_AD.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The cenotaph of Abraham, Ibrahimi Mosque, Hebron: Fallaner, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Holy_Land_2022_(1)_P187_Hebron_Cave_of_the_Patriarchs_Ibrahimi_Mosque_Abraham_Cenotaph.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The approach to the Cave of the Patriarchs, Hebron: Daniel Ventura, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Visit_a_Cave_of_the_Patriarchs_in_Hebron_Palestine_21.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The old enclosure of the well of Zamzam, Makkah: Mardetanha, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Zamzamwill.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Karun River and the White Bridge, Ahvaz: Alireza Javaheri, <a href="https://creativecommons.org/licenses/by/3.0" rel="license">CC BY 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Ahvaz_-_Karoon_%5E_White_Bridge_-_panoramio.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The green dome of the Prophet’s Mosque, Madinah: TheHadiRahim, <a href="http://creativecommons.org/publicdomain/zero/1.0/deed.en" rel="license">CC0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Wide_shot_of_the_Green_Dome_at_The_Prophet%27s_Mosque_(Al_Masjid-e-Nabawi).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>St Peter’s Square from the dome of St Peter’s Basilica, Vatican City: Evadb, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Vatican_Saint_Peter%27s_Square.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Herodian walls of the Cave of the Patriarchs, Hebron: Djampa, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Hebron_Cave_of_the_Patriarchs.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The shore of Lake İznik: Archaeology Tur, Şahin Uysal, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Sahildeniznik.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Lefke Gate, İznik: Dosseman, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Iznik_Wall_at_Lefke_Gate_1255.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Hagia Sophia, İznik (side view): Dosseman, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Iznik_Hagia_Sophia_Mosque_8061.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Hagia Sophia, İznik (courtyard): Dosseman, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Iznik_Hagia_Sophia_Mosque_8350.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Hagia Sophia, Istanbul: Arild Vågen, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Hagia_Sophia_Mars_2013.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Citadel of Qaitbay, Alexandria: لا روسا, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Citadel_of_Qaitbay_014.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Church of St Peter, Antakya: Dosseman, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Antakya_Church_of_St._Peter_exterior_%C4%B1n_2004_01.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Hagia Sophia across the Sultanahmet fountain: Alvesgaspar, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Hagia_Sophia_Istanbul_July_2022-1.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The dome of Hagia Sophia: Ronan Reinart, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Hagia_Sophia_Interior_Panorama.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Hagia Sophia in 1852, lithograph by Louis Haghe after Gaspare Fossati: public domain, via <a href="https://commons.wikimedia.org/wiki/File:Hagia_Sophia_1852.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Pilgrims on the plain of ʿArafāt: Fadi El Binni of Al Jazeera English, <a href="https://creativecommons.org/licenses/by-sa/2.0" rel="license">CC BY-SA 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Pilgrims_must_spend_the_time_within_a_defined_area_on_the_plain_of_Arafat._-_Flickr_-_Al_Jazeera_English.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The tents of Minā: Arisdp, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Mina%27s_tents.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The night at Muzdalifah: Arisdp, <a href="https://creativecommons.org/licenses/by-sa/3.0" rel="license">CC BY-SA 3.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Mabit_in_Muzdalifah.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>İznik tile of the camp at ʿArafāt, Topkapı Palace: Myrabella, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Campement_mont_Arafat_ceramique_Iznik_Topkapi.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Jabal al-Nūr, Makkah: Richard Mortel, <a href="https://creativecommons.org/licenses/by/2.0" rel="license">CC BY 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Jabal_al-Nur,_Mecca,_Saudi_Arabia_(2).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The entrance to the cave of Ḥirāʾ: saudipics, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Hira_Cave.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Quba Mosque at night: Diego Delso, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Mezquita_de_Quba,_Medina,_Arabia_Saudita,_2025-05-22,_DD_16-18_HDR.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Quba Mosque in daylight: Adhi Rachdian, <a href="https://creativecommons.org/licenses/by/2.0" rel="license">CC BY 2.0</a>, via <a href="https://www.flickr.com/photos/27590559@N02/8478555875">Flickr</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Church of the Nativity, Bethlehem: Ala J Graczyk, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/6862610/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Basilica of the Annunciation, Nazareth: sunBeam, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/14756834/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Monastery of Saint Catherine, Sinai: Sokil, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/37305715/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Church of Saint John the Baptist at the baptism site, Jordan: Bob McCaffrey, <a href="https://creativecommons.org/licenses/by-sa/2.0" rel="license">CC BY-SA 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Jesus_baptism_site_-_River_Jordan_015.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Great Mosque of Makkah from above: Rushdi Fatani, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/38546878/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The umbrellas of the Prophet’s Mosque, Madinah: Rushdi Fatani, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/35241867/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>St Peter’s Basilica above the Tiber, Rome: Alejandro Aznar, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/20421988/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The White Bridge over the Karun, Ahvaz: Danial Chitnis, <a href="https://creativecommons.org/licenses/by/2.0" rel="license">CC BY 2.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Ahvaz_White_Bridge_(454291412).jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Desert dunes at sunrise (home page banner): Stephen Leonardi, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/28638937/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A camel caravan at sunset (home page banner): mohamed aouni, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/33566027/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The caves of Qumran (home page banner): BOGDAN SIUDY, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/7161376/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>An Arabic manuscript (home page banner): burcubyzt_85, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/36306963/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Lanterns in a Middle Eastern hall (home page banner): bassel zaki, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/39374938/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The columns of Jerash (home page banner): Francesco Ungaro, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/15997316/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A starlit desert sky (home page banner): Mo Eid, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/17877136/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>An Amarna letter in Akkadian cuneiform, British Museum: Osama Shukir Muhammed Amin FRCP(Glasg), <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Amarna_letter._Letter_from_the_Kassite_king_Burna-Buriash_II_(in_Babylonia,_Mesopotamia)_to_the_Egyptian_Pharaoh_Amenhotep_III._From_Tell_El-Amarna,_Egypt._Circa_1350_BCE._British_Museum.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Stones inscribed with Hebrew words: Dimitry Fadeev, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/jewish-writings-on-stones-5342255/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>An old manuscript in Arabic script: Adam Noor, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/old-book-with-handwriting-18491910/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Arch of Titus, Rome: Josh Withers, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/close-up-of-the-carved-detaild-on-the-arch-of-titus-in-rome-italy-26975956/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The synagogue at Capernaum: Regan Dsouza, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/ancient-ruins-of-capernaum-synagogue-39298578/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Pella, Jordan: Freedom's Falcon, <a href="https://creativecommons.org/licenses/by-sa/4.0" rel="license">CC BY-SA 4.0</a>, via <a href="https://commons.wikimedia.org/wiki/File:Pella_Jordan_004.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Balıklıgöl, Şanlıurfa: Ayşegül  Aytören, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/historic-middle-eastern-pool-with-stone-architecture-36122794/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The ziggurat of Ur: khezez  | خزاز, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/two-men-posing-against-the-ziggurat-of-ur-iraq-23432417/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The beehive houses of Harran: Konevi, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/traditional-beehive-houses-in-harran-turkey-34937457/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A Star of David in a synagogue window: Jonathan Fuentes, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/historic-synagogue-in-boston-with-stained-glass-35183130/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The consecration of the drabsha (Drower, 1937, plate 12): Unknown photographer, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Mandaeans_of_Iraq_12a_-_Drabsha_consecration.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Church domes with crosses: Ruslan Rozanov, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/church-towers-with-domes-12385438/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A mosque dome with a crescent: Mesut  Yalçın, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/cultural-dome-and-crescent-moon-in-aktau-30077472/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A Torah scroll and pointer: cottonbro studio, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/person-holding-black-and-white-tube-5986499/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Law books: Pixabay, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/icra-iflas-piled-book-159832/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>An illuminated Arabic page: mohamed abdelghaffar, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/close-up-of-ancient-arabic-manuscript-text-29342503/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A halal butcher, Mingora: Amjad ali, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/traditional-meat-market-stall-in-pakistan-38230882/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Challah bread: cottonbro studio, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/person-holding-a-jewish-bread-6054114/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Bread, grapes and wine: KoolShooters, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/red-grapes-fruits-on-white-ceramic-plate-9750890/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Let Us Beat Swords into Plowshares, United Nations: Rodsan18, public domain, via <a href="https://commons.wikimedia.org/wiki/File:Image-UN_Swords_into_Plowshares_Statue.JPG">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Doves over a fortress wall: Tahir Xəlfəquliyev, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/white-doves-on-ancient-stone-fortress-wall-36323016/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A dove with an olive branch: Artem Podrez, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/paper-cutouts-on-a-gray-surface-7048014/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>An open Qur’an on a stand: MATAQ Darul Ulum, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/koran-on-wooden-table-10346836/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>An open Bible on an altar: Wendy van Zyl, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/tilt-shift-photography-of-opened-bible-7076710/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A page of the Qur’an in warm light: Jahra Tasfia Reza, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/open-quran-with-arabic-calligraphy-in-warm-light-36188877/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A page of Codex Alexandrinus: Edward Maunde Thompson, facsimile of the Codex Alexandrinus (1879 to 1883), <a href="https://creativecommons.org/publicdomain/zero/1.0/" rel="license">CC0</a>, via <a href="https://commons.wikimedia.org/wiki/File:CodexAlexandrinus_0858.jpg">Wikimedia Commons</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Readers studying a book together: cottonbro studio, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/people-in-a-library-6344233/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The rooftops of the Old City of Jerusalem: Anat Landa, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/scenic-view-of-jerusalem-s-historic-old-city-38445997/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Olive oil in a glass jar: Diana ✨, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/clear-airtight-canister-with-brown-liquid-1611560/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Palm trees near Tabuk: French Sweetie, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/desert-trees-28170223/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Calligraphy in a mosque: Sami TÜRK, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/writing-in-arabic-on-wall-in-mosque-12123505/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Calligraphy on parchment: Budget Bizar, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/close-up-of-a-text-written-in-gothic-font-12347306/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Reading a Torah scroll: Maor Attias, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/tora-and-hand-over-it-5192346/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The Kaaba from above: Konevi, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/aerial-view-of-crowded-kaaba-in-mecca-34246980/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A green valley among hills: Anat Landa, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/scenic-view-of-lush-green-valley-and-distant-hills-38430998/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Wedding rings: Melike  B, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/hands-of-groom-and-bride-with-wedding-rings-10074704/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Ancient fortress walls, Derbent: Ilya Perelude, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/trees-around-medieval-walls-8936648/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Sunlight through clouds: Inderpreet Sekhon, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/clouds-covering-the-sun-4132994/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>The ruins of Babylon: khezez  | خزاز, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/ancient-city-in-desert-12050747/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Wadi Mujib, Jordan: Francesco Ungaro, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/rocky-mountain-range-15997547/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>An open Qur’an with prayer beads: UMA media, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/quran-with-prayer-beads-on-green-surface-31024871/">Pexels</a>.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>A historic synagogue: cottonbro studio, <a href="https://www.pexels.com/license/" rel="license">Pexels licence</a>, via <a href="https://www.pexels.com/photo/the-interior-of-a-synagogue-5986454/">Pexels</a>.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:thank-you', 'photo' => array( 'name' => 'page-thank-you', 'alt' => 'Thank you on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'thank-you', 'title' => 'Thank you', 'parent' => 'page:donate',
			'excerpt' => 'Your gift keeps Abrahamic Religions free to read. Here is what happens next.', 'description' => 'Thank you for supporting Abrahamic Religions. Your support pays for the research, writing and hosting that keep every page free to read. Your gift keeps the site free to read for everyone. Read on.', 'menu_order' => 27, 'special' => '', 'since' => 8,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Thank you for supporting Abrahamic Religions. Your gift pays for the research and writing behind each page and keeps the site online, free to read and free of advertising. Every contribution, large or small, goes to the work of the site and to nothing else.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#your-receipt">Thank you: your receipt</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#staying-in-touch">Staying in touch</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"your-receipt"} -->
<h2 class="wp-block-heading" id="your-receipt">Thank you: your receipt</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The payment provider sends a receipt to the email address used for the payment. Signing in to your account with that provider shows the details of the transaction.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"staying-in-touch"} -->
<h2 class="wp-block-heading" id="staying-in-touch">Staying in touch</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Questions, corrections and suggestions are welcome through the <a href="/about/contact/">Contact</a> page. To hear when new material appears, use the sign-up form at the foot of the <a href="/#newsletter">home page</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Return to the <a href="/journal/">Journal</a> or browse the <a href="/reference/">Reference</a> section.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://www.paypal.com/">PayPal</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:tanakh', 'photo' => array( 'name' => 'page-tanakh', 'alt' => 'The Tanakh on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'tanakh', 'title' => 'The Tanakh', 'parent' => 'page:sacred-texts',
			'excerpt' => 'The twenty-four books of the Hebrew Bible with their Hebrew names, arranged as Torah, Nevi’im and Ketuvim.', 'description' => 'The twenty-four books of the Hebrew Bible with their Hebrew names and order. Explore the Tanakh book by book.', 'menu_order' => 1, 'special' => '', 'since' => 13,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Hebrew Bible is known in Judaism as the Tanakh (<span lang="he" dir="rtl">תנ״ך</span>, an acronym of its three parts): Torah, Nevi'im and Ketuvim. It contains twenty-four books in the Jewish reckoning. Christian Old Testaments hold the same material, counted as thirty-nine books, because Samuel, Kings, Chronicles and Ezra-Nehemiah are each split in two and the Twelve Prophets are counted separately.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#torah">The Tanakh: torah</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#nevi-im">Nevi'im</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#ketuvim">Ketuvim</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#order-and-text">Order and text</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="tanakh" alt="Hebrew text in three columns on a folio of the Leningrad Codex, the oldest complete manuscript of the Hebrew Bible" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"torah"} -->
<h2 class="wp-block-heading" id="torah">The Tanakh: torah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The five books of <a href="/reference/figures/#moses">Moses</a>, (<span lang="he" dir="rtl">תורה</span>, instruction), read in the synagogue in an annual cycle. Each Hebrew name comes from an opening word of the book.</p>
<!-- /wp:paragraph -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><thead><tr><th>#</th><th>Hebrew</th><th>Name</th><th>English</th><th>Meaning of the Hebrew</th></tr></thead><tbody><tr><td>1</td><td><span lang="he" dir="rtl">בְּרֵאשִׁית</span></td><td>Bereshit</td><td>Genesis</td><td>In the beginning</td></tr><tr><td>2</td><td><span lang="he" dir="rtl">שְׁמוֹת</span></td><td>Shemot</td><td>Exodus</td><td>Names</td></tr><tr><td>3</td><td><span lang="he" dir="rtl">וַיִּקְרָא</span></td><td>Vayikra</td><td>Leviticus</td><td>And he called</td></tr><tr><td>4</td><td><span lang="he" dir="rtl">בְּמִדְבַּר</span></td><td>Bemidbar</td><td>Numbers</td><td>In the wilderness</td></tr><tr><td>5</td><td><span lang="he" dir="rtl">דְּבָרִים</span></td><td>Devarim</td><td>Deuteronomy</td><td>Words</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:heading {"anchor":"nevi-im"} -->
<h2 class="wp-block-heading" id="nevi-im">Nevi'im</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Prophets, (<span lang="he" dir="rtl">נביאים</span>, prophets), in two groups: the Former Prophets, which continue the history from the entry into the land, and the Latter Prophets.</p>
<!-- /wp:paragraph -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><thead><tr><th>#</th><th>Hebrew</th><th>Name</th><th>English</th><th>Group</th></tr></thead><tbody><tr><td>6</td><td><span lang="he" dir="rtl">יְהוֹשֻׁעַ</span></td><td>Yehoshua</td><td>Joshua</td><td>Former Prophets</td></tr><tr><td>7</td><td><span lang="he" dir="rtl">שׁוֹפְטִים</span></td><td>Shofetim</td><td>Judges</td><td>Former Prophets</td></tr><tr><td>8</td><td><span lang="he" dir="rtl">שְׁמוּאֵל</span></td><td>Shemuel</td><td>Samuel</td><td>Former Prophets</td></tr><tr><td>9</td><td><span lang="he" dir="rtl">מְלָכִים</span></td><td>Melakhim</td><td>Kings</td><td>Former Prophets</td></tr><tr><td>10</td><td><span lang="he" dir="rtl">יְשַׁעְיָהוּ</span></td><td>Yeshayahu</td><td>Isaiah</td><td>Latter Prophets</td></tr><tr><td>11</td><td><span lang="he" dir="rtl">יִרְמְיָהוּ</span></td><td>Yirmeyahu</td><td>Jeremiah</td><td>Latter Prophets</td></tr><tr><td>12</td><td><span lang="he" dir="rtl">יְחֶזְקֵאל</span></td><td>Yehezkel</td><td>Ezekiel</td><td>Latter Prophets</td></tr><tr><td>13</td><td><span lang="he" dir="rtl">תְּרֵי עֲשַׂר</span></td><td>Trei Asar</td><td>The Twelve</td><td>Latter Prophets</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>The Twelve, counted as one book, are Hosea (<span lang="he" dir="rtl">הוֹשֵׁעַ</span>, Hoshea), Joel (<span lang="he" dir="rtl">יוֹאֵל</span>, Yoel), Amos (<span lang="he" dir="rtl">עָמוֹס</span>, Amos), Obadiah (<span lang="he" dir="rtl">עֹבַדְיָה</span>, Ovadyah), Jonah (<span lang="he" dir="rtl">יוֹנָה</span>, Yonah), Micah (<span lang="he" dir="rtl">מִיכָה</span>, Mikhah), Nahum (<span lang="he" dir="rtl">נַחוּם</span>, Nahum), Habakkuk (<span lang="he" dir="rtl">חֲבַקּוּק</span>, Havakkuk), Zephaniah (<span lang="he" dir="rtl">צְפַנְיָה</span>, Tzefanyah), Haggai (<span lang="he" dir="rtl">חַגַּי</span>, Haggai), Zechariah (<span lang="he" dir="rtl">זְכַרְיָה</span>, Zekharyah) and Malachi (<span lang="he" dir="rtl">מַלְאָכִי</span>, Malakhi).</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ketuvim"} -->
<h2 class="wp-block-heading" id="ketuvim">Ketuvim</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Writings, (<span lang="he" dir="rtl">כתובים</span>, writings), gather poetry, wisdom, history and the five scrolls read at festivals.</p>
<!-- /wp:paragraph -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><thead><tr><th>#</th><th>Hebrew</th><th>Name</th><th>English</th><th>Note</th></tr></thead><tbody><tr><td>14</td><td><span lang="he" dir="rtl">תְּהִלִּים</span></td><td>Tehillim</td><td>Psalms</td><td>Praises</td></tr><tr><td>15</td><td><span lang="he" dir="rtl">מִשְׁלֵי</span></td><td>Mishlei</td><td>Proverbs</td><td></td></tr><tr><td>16</td><td><span lang="he" dir="rtl">אִיּוֹב</span></td><td>Iyov</td><td>Job</td><td></td></tr><tr><td>17</td><td><span lang="he" dir="rtl">שִׁיר הַשִּׁירִים</span></td><td>Shir haShirim</td><td>Song of Songs</td><td>Scroll, Passover</td></tr><tr><td>18</td><td><span lang="he" dir="rtl">רוּת</span></td><td>Rut</td><td>Ruth</td><td>Scroll, Shavuot</td></tr><tr><td>19</td><td><span lang="he" dir="rtl">אֵיכָה</span></td><td>Eikhah</td><td>Lamentations</td><td>Scroll, Ninth of Av</td></tr><tr><td>20</td><td><span lang="he" dir="rtl">קֹהֶלֶת</span></td><td>Kohelet</td><td>Ecclesiastes</td><td>Scroll, Sukkot</td></tr><tr><td>21</td><td><span lang="he" dir="rtl">אֶסְתֵּר</span></td><td>Esther</td><td>Esther</td><td>Scroll, Purim</td></tr><tr><td>22</td><td><span lang="he" dir="rtl">דָּנִיֵּאל</span></td><td>Daniel</td><td>Daniel</td><td>Partly in Aramaic</td></tr><tr><td>23</td><td><span lang="he" dir="rtl">עֶזְרָא־נְחֶמְיָה</span></td><td>Ezra-Nehemiah</td><td>Ezra and Nehemiah</td><td>Partly in Aramaic</td></tr><tr><td>24</td><td><span lang="he" dir="rtl">דִּבְרֵי הַיָּמִים</span></td><td>Divrei haYamim</td><td>Chronicles</td><td>Events of the days</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:heading {"anchor":"order-and-text"} -->
<h2 class="wp-block-heading" id="order-and-text">Order and text</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The order above is the traditional Jewish one, which differs from Christian Bibles: the Tanakh closes with Chronicles, while Christian Old Testaments close with the prophets, so that the prophetic books stand immediately before the Gospels. The text in use is the Masoretic Text, fixed with vowel points and accents by the Masoretes between the seventh and tenth centuries CE. The Dead Sea Scrolls, copied between the third century BCE and the first century CE, give witnesses a thousand years older, most of them close to the Masoretic Text.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Continue with <a href="/reference/sacred-texts/bible/">The Christian Bible</a>, <a href="/reference/sacred-texts/quran/">The Qur'an</a> or the <a href="/reference/glossary/">Glossary</a>.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://www.sefaria.org/">The Tanakh in Hebrew and English (Sefaria)</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:bible', 'photo' => array( 'name' => 'page-bible', 'alt' => 'The Bible on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'bible', 'title' => 'The Christian Bible', 'parent' => 'page:sacred-texts',
			'excerpt' => 'The books of the Christian Bible and how the canon differs between Protestant, Catholic, Orthodox and Ethiopian churches.', 'description' => 'Every book of the Christian Bible, and how the canon differs between churches. Compare the lists side by side.', 'menu_order' => 2, 'special' => '', 'since' => 13,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Bible of the Christian churches is a library of books gathered over many centuries, and the churches do not all agree on its contents. Christians share one New Testament of twenty-seven books and differ over the Old Testament. The disagreement concerns a set of books written in the last centuries BCE, preserved in Greek in the Septuagint, which Catholics call deuterocanonical and Protestants call the Apocrypha. Counting them gives 66 books in Protestant Bibles, 73 in Catholic Bibles, commonly 76 to 79 in the Orthodox churches, and 81 in the Ethiopian Orthodox Tewahedo canon.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-old-testament-held-in-common">The Bible: the Old Testament held in common</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#books-that-divide-the-canons">Books that divide the canons</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-new-testament">The New Testament</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-the-canons-took-shape">How the canons took shape</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="christian-bible" alt="Greek uncial columns of the Gospel of Mark in the fifth-century Codex Alexandrinus" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-old-testament-held-in-common"} -->
<h2 class="wp-block-heading" id="the-old-testament-held-in-common">The Bible: the Old Testament held in common</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>These thirty-nine books appear in every Christian canon. They hold the same material as the twenty-four books of the <a href="/reference/sacred-texts/tanakh/">Tanakh</a>, divided differently.</p>
<!-- /wp:paragraph -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><thead><tr><th>Group</th><th>Books</th></tr></thead><tbody><tr><td>Law</td><td>Genesis, Exodus, Leviticus, Numbers, Deuteronomy</td></tr><tr><td>History</td><td>Joshua, Judges, Ruth, 1 and 2 Samuel, 1 and 2 Kings, 1 and 2 Chronicles, Ezra, Nehemiah, Esther</td></tr><tr><td>Wisdom and poetry</td><td>Job, Psalms, Proverbs, Ecclesiastes, Song of Songs</td></tr><tr><td>Major Prophets</td><td>Isaiah, Jeremiah, Lamentations, Ezekiel, Daniel</td></tr><tr><td>Minor Prophets</td><td>Hosea, Joel, Amos, Obadiah, Jonah, Micah, Nahum, Habakkuk, Zephaniah, Haggai, Zechariah, Malachi</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:heading {"anchor":"books-that-divide-the-canons"} -->
<h2 class="wp-block-heading" id="books-that-divide-the-canons">Books that divide the canons</h2>
<!-- /wp:heading -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><thead><tr><th>Book</th><th>Protestant</th><th>Catholic</th><th>Eastern Orthodox</th><th>Ethiopian Tewahedo</th></tr></thead><tbody><tr><td>Tobit</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>Judith</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>Wisdom of Solomon</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>Sirach (Ecclesiasticus)</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>Baruch, with the Letter of Jeremiah</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>Additions to Esther</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>Additions to Daniel</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>1 Maccabees</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Not included</td></tr><tr><td>2 Maccabees</td><td>Apocrypha</td><td>Canonical</td><td>Canonical</td><td>Not included</td></tr><tr><td>3 Maccabees</td><td>Not included</td><td>Not canonical</td><td>Canonical</td><td>Not included</td></tr><tr><td>4 Maccabees</td><td>Not included</td><td>Not canonical</td><td>Appendix in Greek Bibles</td><td>Not included</td></tr><tr><td>1 Esdras</td><td>Not included</td><td>Not canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>2 Esdras (4 Ezra)</td><td>Not included</td><td>Not canonical</td><td>In some editions</td><td>Canonical</td></tr><tr><td>Prayer of Manasseh</td><td>Not included</td><td>Not canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>Psalm 151</td><td>Not included</td><td>Not canonical</td><td>Canonical</td><td>Canonical</td></tr><tr><td>Jubilees</td><td>Not included</td><td>Not included</td><td>Not included</td><td>Canonical</td></tr><tr><td>1 Enoch</td><td>Not included</td><td>Not included</td><td>Not included</td><td>Canonical</td></tr><tr><td>1, 2 and 3 Meqabyan</td><td>Not included</td><td>Not included</td><td>Not included</td><td>Canonical</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>The additions to Esther and Daniel are passages within those books, including the Prayer of Azariah, Susanna and Bel and the Dragon. Orthodox practice varies between national churches, which is why the totals are given as a range.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-new-testament"} -->
<h2 class="wp-block-heading" id="the-new-testament">The New Testament</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All churches hold the same twenty-seven books.</p>
<!-- /wp:paragraph -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><thead><tr><th>Group</th><th>Books</th></tr></thead><tbody><tr><td>Gospels</td><td>Matthew, Mark, Luke, John</td></tr><tr><td>History</td><td>Acts of the Apostles</td></tr><tr><td>Letters of Paul</td><td>Romans, 1 and 2 Corinthians, Galatians, Ephesians, Philippians, Colossians, 1 and 2 Thessalonians, 1 and 2 Timothy, Titus, Philemon</td></tr><tr><td>General letters</td><td>Hebrews, James, 1 and 2 Peter, 1, 2 and 3 John, Jude</td></tr><tr><td>Prophecy</td><td>Revelation</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:heading {"anchor":"how-the-canons-took-shape"} -->
<h2 class="wp-block-heading" id="how-the-canons-took-shape">How the canons took shape</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Early churches used the Septuagint, the Greek translation made for Greek-speaking Jews from the third century BCE, which carried the additional books. Jerome, translating into Latin in the fourth century CE, marked them as useful for edification while holding the Hebrew canon as the standard; the Western church kept them in use for a thousand years. The Reformers returned to the Hebrew canon and printed the remainder separately as the Apocrypha, and the Council of Trent affirmed the longer list for Catholics in 1546. The Orthodox churches never defined their canon as tightly, which accounts for the variation still found among them.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Continue with <a href="/reference/sacred-texts/tanakh/">The Tanakh</a>, <a href="/reference/sacred-texts/quran/">The Qur'an</a> or <a href="/reference/comparisons/">Comparative studies</a>.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://www.biblegateway.com/">Bible Gateway</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:quran', 'photo' => array( 'name' => 'page-quran', 'alt' => 'The Qur’an on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'quran', 'title' => 'The Qur’an', 'parent' => 'page:sacred-texts',
			'excerpt' => 'All 114 surahs of the Qur’an with their Arabic names, meanings, verse counts and place of revelation.', 'description' => 'All 114 surahs with Arabic names, meanings and verse counts. Browse the chapters of the Qur’an in order.', 'menu_order' => 3, 'special' => '', 'since' => 13,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Qur'an (<span lang="ar" dir="rtl">قرآن</span>, "recitation") contains 114 chapters, called surahs (<span lang="ar" dir="rtl">سورة</span>, chapter), made up of verses called ayahs (<span lang="ar" dir="rtl">آية</span>, "sign"). Muslims hold it to be the speech of God revealed to the Prophet Muhammad in Arabic over some twenty-three years, preserved in writing and in the memory of reciters in every generation.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#how-the-text-is-arranged">The Qur’an: how the text is arranged</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-114-surahs">The 114 surahs</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#reading-further">Reading further</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"how-the-text-is-arranged"} -->
<h2 class="wp-block-heading" id="how-the-text-is-arranged">The Qur’an: how the text is arranged</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The surahs are set out broadly from longest to shortest, which is not the order of revelation. Each is named from a word or theme within it, so The Cow takes its name from a passage about a heifer, and The Elephant from the year of the attack on <a href="/reference/places/#makkah">Makkah</a>. Every surah except the ninth opens with the <em>basmalah</em> (<span lang="ar" dir="rtl">بسم الله الرحمن الرحيم</span>, in the name of God, the Most Gracious, the Most Merciful). Twenty-nine begin with detached letters, the <em>muqaṭṭaʿāt</em> (<span lang="ar" dir="rtl">مقطعات</span>, the abbreviated letters), whose meaning remains unsettled.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Each surah is classed as Makkan or Madinan according to whether it was revealed before or after the migration of 622 CE. Eighty-six are Makkan and twenty-eight Madinan. For reading and recitation the text is also divided into thirty parts of roughly equal length, called <em>juzʾ</em> (<span lang="ar" dir="rtl">جزء</span>, part).</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The verse totals below follow the Kufan count, the most widely used today, which gives 6,236 verses in all. Other schools of counting divide a few verses differently and reach slightly different totals.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-114-surahs"} -->
<h2 class="wp-block-heading" id="the-114-surahs">The 114 surahs</h2>
<!-- /wp:heading -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><thead><tr><th>#</th><th>Arabic</th><th>Name</th><th>Meaning</th><th>Verses</th><th>Revealed</th></tr></thead><tbody><tr><td>1</td><td><span lang="ar" dir="rtl">الفاتحة</span></td><td>Al-Fatihah</td><td>The Opening</td><td>7</td><td>Makkah</td></tr><tr><td>2</td><td><span lang="ar" dir="rtl">البقرة</span></td><td>Al-Baqarah</td><td>The Cow</td><td>286</td><td>Madinah</td></tr><tr><td>3</td><td><span lang="ar" dir="rtl">آل عمران</span></td><td>Al Imran</td><td>The Family of Imran</td><td>200</td><td>Madinah</td></tr><tr><td>4</td><td><span lang="ar" dir="rtl">النساء</span></td><td>An-Nisa</td><td>The Women</td><td>176</td><td>Madinah</td></tr><tr><td>5</td><td><span lang="ar" dir="rtl">المائدة</span></td><td>Al-Ma'idah</td><td>The Table Spread</td><td>120</td><td>Madinah</td></tr><tr><td>6</td><td><span lang="ar" dir="rtl">الأنعام</span></td><td>Al-An'am</td><td>The Cattle</td><td>165</td><td>Makkah</td></tr><tr><td>7</td><td><span lang="ar" dir="rtl">الأعراف</span></td><td>Al-A'raf</td><td>The Heights</td><td>206</td><td>Makkah</td></tr><tr><td>8</td><td><span lang="ar" dir="rtl">الأنفال</span></td><td>Al-Anfal</td><td>The Spoils of War</td><td>75</td><td>Madinah</td></tr><tr><td>9</td><td><span lang="ar" dir="rtl">التوبة</span></td><td>At-Tawbah</td><td>The Repentance</td><td>129</td><td>Madinah</td></tr><tr><td>10</td><td><span lang="ar" dir="rtl">يونس</span></td><td>Yunus</td><td>Jonah</td><td>109</td><td>Makkah</td></tr><tr><td>11</td><td><span lang="ar" dir="rtl">هود</span></td><td>Hud</td><td>Hud</td><td>123</td><td>Makkah</td></tr><tr><td>12</td><td><span lang="ar" dir="rtl">يوسف</span></td><td>Yusuf</td><td>Joseph</td><td>111</td><td>Makkah</td></tr><tr><td>13</td><td><span lang="ar" dir="rtl">الرعد</span></td><td>Ar-Ra'd</td><td>The Thunder</td><td>43</td><td>Madinah</td></tr><tr><td>14</td><td><span lang="ar" dir="rtl">إبراهيم</span></td><td>Ibrahim</td><td>Abraham</td><td>52</td><td>Makkah</td></tr><tr><td>15</td><td><span lang="ar" dir="rtl">الحجر</span></td><td>Al-Hijr</td><td>The Rocky Tract</td><td>99</td><td>Makkah</td></tr><tr><td>16</td><td><span lang="ar" dir="rtl">النحل</span></td><td>An-Nahl</td><td>The Bees</td><td>128</td><td>Makkah</td></tr><tr><td>17</td><td><span lang="ar" dir="rtl">الإسراء</span></td><td>Al-Isra</td><td>The Night Journey</td><td>111</td><td>Makkah</td></tr><tr><td>18</td><td><span lang="ar" dir="rtl">الكهف</span></td><td>Al-Kahf</td><td>The Cave</td><td>110</td><td>Makkah</td></tr><tr><td>19</td><td><span lang="ar" dir="rtl">مريم</span></td><td>Maryam</td><td>Mary</td><td>98</td><td>Makkah</td></tr><tr><td>20</td><td><span lang="ar" dir="rtl">طه</span></td><td>Ta-Ha</td><td>Ta Ha</td><td>135</td><td>Makkah</td></tr><tr><td>21</td><td><span lang="ar" dir="rtl">الأنبياء</span></td><td>Al-Anbiya</td><td>The Prophets</td><td>112</td><td>Makkah</td></tr><tr><td>22</td><td><span lang="ar" dir="rtl">الحج</span></td><td>Al-Hajj</td><td>The Pilgrimage</td><td>78</td><td>Madinah</td></tr><tr><td>23</td><td><span lang="ar" dir="rtl">المؤمنون</span></td><td>Al-Mu'minun</td><td>The Believers</td><td>118</td><td>Makkah</td></tr><tr><td>24</td><td><span lang="ar" dir="rtl">النور</span></td><td>An-Nur</td><td>The Light</td><td>64</td><td>Madinah</td></tr><tr><td>25</td><td><span lang="ar" dir="rtl">الفرقان</span></td><td>Al-Furqan</td><td>The Criterion</td><td>77</td><td>Makkah</td></tr><tr><td>26</td><td><span lang="ar" dir="rtl">الشعراء</span></td><td>Ash-Shu'ara</td><td>The Poets</td><td>227</td><td>Makkah</td></tr><tr><td>27</td><td><span lang="ar" dir="rtl">النمل</span></td><td>An-Naml</td><td>The Ant</td><td>93</td><td>Makkah</td></tr><tr><td>28</td><td><span lang="ar" dir="rtl">القصص</span></td><td>Al-Qasas</td><td>The Stories</td><td>88</td><td>Makkah</td></tr><tr><td>29</td><td><span lang="ar" dir="rtl">العنكبوت</span></td><td>Al-Ankabut</td><td>The Spider</td><td>69</td><td>Makkah</td></tr><tr><td>30</td><td><span lang="ar" dir="rtl">الروم</span></td><td>Ar-Rum</td><td>The Romans</td><td>60</td><td>Makkah</td></tr><tr><td>31</td><td><span lang="ar" dir="rtl">لقمان</span></td><td>Luqman</td><td>Luqman</td><td>34</td><td>Makkah</td></tr><tr><td>32</td><td><span lang="ar" dir="rtl">السجدة</span></td><td>As-Sajdah</td><td>The Prostration</td><td>30</td><td>Makkah</td></tr><tr><td>33</td><td><span lang="ar" dir="rtl">الأحزاب</span></td><td>Al-Ahzab</td><td>The Confederates</td><td>73</td><td>Madinah</td></tr><tr><td>34</td><td><span lang="ar" dir="rtl">سبأ</span></td><td>Saba</td><td>Sheba</td><td>54</td><td>Makkah</td></tr><tr><td>35</td><td><span lang="ar" dir="rtl">فاطر</span></td><td>Fatir</td><td>The Originator</td><td>45</td><td>Makkah</td></tr><tr><td>36</td><td><span lang="ar" dir="rtl">يس</span></td><td>Ya-Sin</td><td>Ya Sin</td><td>83</td><td>Makkah</td></tr><tr><td>37</td><td><span lang="ar" dir="rtl">الصافات</span></td><td>As-Saffat</td><td>Those Ranged in Ranks</td><td>182</td><td>Makkah</td></tr><tr><td>38</td><td><span lang="ar" dir="rtl">ص</span></td><td>Sad</td><td>Sad</td><td>88</td><td>Makkah</td></tr><tr><td>39</td><td><span lang="ar" dir="rtl">الزمر</span></td><td>Az-Zumar</td><td>The Crowds</td><td>75</td><td>Makkah</td></tr><tr><td>40</td><td><span lang="ar" dir="rtl">غافر</span></td><td>Ghafir</td><td>The Forgiver</td><td>85</td><td>Makkah</td></tr><tr><td>41</td><td><span lang="ar" dir="rtl">فصلت</span></td><td>Fussilat</td><td>Explained in Detail</td><td>54</td><td>Makkah</td></tr><tr><td>42</td><td><span lang="ar" dir="rtl">الشورى</span></td><td>Ash-Shura</td><td>The Consultation</td><td>53</td><td>Makkah</td></tr><tr><td>43</td><td><span lang="ar" dir="rtl">الزخرف</span></td><td>Az-Zukhruf</td><td>The Ornaments of Gold</td><td>89</td><td>Makkah</td></tr><tr><td>44</td><td><span lang="ar" dir="rtl">الدخان</span></td><td>Ad-Dukhan</td><td>The Smoke</td><td>59</td><td>Makkah</td></tr><tr><td>45</td><td><span lang="ar" dir="rtl">الجاثية</span></td><td>Al-Jathiyah</td><td>The Kneeling</td><td>37</td><td>Makkah</td></tr><tr><td>46</td><td><span lang="ar" dir="rtl">الأحقاف</span></td><td>Al-Ahqaf</td><td>The Sand Dunes</td><td>35</td><td>Makkah</td></tr><tr><td>47</td><td><span lang="ar" dir="rtl">محمد</span></td><td>Muhammad</td><td>Muhammad</td><td>38</td><td>Madinah</td></tr><tr><td>48</td><td><span lang="ar" dir="rtl">الفتح</span></td><td>Al-Fath</td><td>The Victory</td><td>29</td><td>Madinah</td></tr><tr><td>49</td><td><span lang="ar" dir="rtl">الحجرات</span></td><td>Al-Hujurat</td><td>The Private Apartments</td><td>18</td><td>Madinah</td></tr><tr><td>50</td><td><span lang="ar" dir="rtl">ق</span></td><td>Qaf</td><td>Qaf</td><td>45</td><td>Makkah</td></tr><tr><td>51</td><td><span lang="ar" dir="rtl">الذاريات</span></td><td>Adh-Dhariyat</td><td>The Winnowing Winds</td><td>60</td><td>Makkah</td></tr><tr><td>52</td><td><span lang="ar" dir="rtl">الطور</span></td><td>At-Tur</td><td>The Mount</td><td>49</td><td>Makkah</td></tr><tr><td>53</td><td><span lang="ar" dir="rtl">النجم</span></td><td>An-Najm</td><td>The Star</td><td>62</td><td>Makkah</td></tr><tr><td>54</td><td><span lang="ar" dir="rtl">القمر</span></td><td>Al-Qamar</td><td>The Moon</td><td>55</td><td>Makkah</td></tr><tr><td>55</td><td><span lang="ar" dir="rtl">الرحمن</span></td><td>Ar-Rahman</td><td>The Most Merciful</td><td>78</td><td>Madinah</td></tr><tr><td>56</td><td><span lang="ar" dir="rtl">الواقعة</span></td><td>Al-Waqi'ah</td><td>The Inevitable</td><td>96</td><td>Makkah</td></tr><tr><td>57</td><td><span lang="ar" dir="rtl">الحديد</span></td><td>Al-Hadid</td><td>Iron</td><td>29</td><td>Madinah</td></tr><tr><td>58</td><td><span lang="ar" dir="rtl">المجادلة</span></td><td>Al-Mujadilah</td><td>The Pleading Woman</td><td>22</td><td>Madinah</td></tr><tr><td>59</td><td><span lang="ar" dir="rtl">الحشر</span></td><td>Al-Hashr</td><td>The Gathering</td><td>24</td><td>Madinah</td></tr><tr><td>60</td><td><span lang="ar" dir="rtl">الممتحنة</span></td><td>Al-Mumtahanah</td><td>She Who Is Examined</td><td>13</td><td>Madinah</td></tr><tr><td>61</td><td><span lang="ar" dir="rtl">الصف</span></td><td>As-Saff</td><td>The Ranks</td><td>14</td><td>Madinah</td></tr><tr><td>62</td><td><span lang="ar" dir="rtl">الجمعة</span></td><td>Al-Jumu'ah</td><td>Friday</td><td>11</td><td>Madinah</td></tr><tr><td>63</td><td><span lang="ar" dir="rtl">المنافقون</span></td><td>Al-Munafiqun</td><td>The Hypocrites</td><td>11</td><td>Madinah</td></tr><tr><td>64</td><td><span lang="ar" dir="rtl">التغابن</span></td><td>At-Taghabun</td><td>Mutual Loss and Gain</td><td>18</td><td>Madinah</td></tr><tr><td>65</td><td><span lang="ar" dir="rtl">الطلاق</span></td><td>At-Talaq</td><td>Divorce</td><td>12</td><td>Madinah</td></tr><tr><td>66</td><td><span lang="ar" dir="rtl">التحريم</span></td><td>At-Tahrim</td><td>The Prohibition</td><td>12</td><td>Madinah</td></tr><tr><td>67</td><td><span lang="ar" dir="rtl">الملك</span></td><td>Al-Mulk</td><td>The Sovereignty</td><td>30</td><td>Makkah</td></tr><tr><td>68</td><td><span lang="ar" dir="rtl">القلم</span></td><td>Al-Qalam</td><td>The Pen</td><td>52</td><td>Makkah</td></tr><tr><td>69</td><td><span lang="ar" dir="rtl">الحاقة</span></td><td>Al-Haqqah</td><td>The Reality</td><td>52</td><td>Makkah</td></tr><tr><td>70</td><td><span lang="ar" dir="rtl">المعارج</span></td><td>Al-Ma'arij</td><td>The Ascending Stairways</td><td>44</td><td>Makkah</td></tr><tr><td>71</td><td><span lang="ar" dir="rtl">نوح</span></td><td>Nuh</td><td>Noah</td><td>28</td><td>Makkah</td></tr><tr><td>72</td><td><span lang="ar" dir="rtl">الجن</span></td><td>Al-Jinn</td><td>The Jinn</td><td>28</td><td>Makkah</td></tr><tr><td>73</td><td><span lang="ar" dir="rtl">المزمل</span></td><td>Al-Muzzammil</td><td>The Enshrouded One</td><td>20</td><td>Makkah</td></tr><tr><td>74</td><td><span lang="ar" dir="rtl">المدثر</span></td><td>Al-Muddaththir</td><td>The Cloaked One</td><td>56</td><td>Makkah</td></tr><tr><td>75</td><td><span lang="ar" dir="rtl">القيامة</span></td><td>Al-Qiyamah</td><td>The Resurrection</td><td>40</td><td>Makkah</td></tr><tr><td>76</td><td><span lang="ar" dir="rtl">الإنسان</span></td><td>Al-Insan</td><td>Man</td><td>31</td><td>Madinah</td></tr><tr><td>77</td><td><span lang="ar" dir="rtl">المرسلات</span></td><td>Al-Mursalat</td><td>Those Sent Forth</td><td>50</td><td>Makkah</td></tr><tr><td>78</td><td><span lang="ar" dir="rtl">النبأ</span></td><td>An-Naba</td><td>The Tidings</td><td>40</td><td>Makkah</td></tr><tr><td>79</td><td><span lang="ar" dir="rtl">النازعات</span></td><td>An-Nazi'at</td><td>Those Who Drag Forth</td><td>46</td><td>Makkah</td></tr><tr><td>80</td><td><span lang="ar" dir="rtl">عبس</span></td><td>Abasa</td><td>He Frowned</td><td>42</td><td>Makkah</td></tr><tr><td>81</td><td><span lang="ar" dir="rtl">التكوير</span></td><td>At-Takwir</td><td>The Overthrowing</td><td>29</td><td>Makkah</td></tr><tr><td>82</td><td><span lang="ar" dir="rtl">الإنفطار</span></td><td>Al-Infitar</td><td>The Cleaving Asunder</td><td>19</td><td>Makkah</td></tr><tr><td>83</td><td><span lang="ar" dir="rtl">المطففين</span></td><td>Al-Mutaffifin</td><td>Those Who Give Short Measure</td><td>36</td><td>Makkah</td></tr><tr><td>84</td><td><span lang="ar" dir="rtl">الإنشقاق</span></td><td>Al-Inshiqaq</td><td>The Splitting Asunder</td><td>25</td><td>Makkah</td></tr><tr><td>85</td><td><span lang="ar" dir="rtl">البروج</span></td><td>Al-Buruj</td><td>The Constellations</td><td>22</td><td>Makkah</td></tr><tr><td>86</td><td><span lang="ar" dir="rtl">الطارق</span></td><td>At-Tariq</td><td>The Night Comer</td><td>17</td><td>Makkah</td></tr><tr><td>87</td><td><span lang="ar" dir="rtl">الأعلى</span></td><td>Al-A'la</td><td>The Most High</td><td>19</td><td>Makkah</td></tr><tr><td>88</td><td><span lang="ar" dir="rtl">الغاشية</span></td><td>Al-Ghashiyah</td><td>The Overwhelming</td><td>26</td><td>Makkah</td></tr><tr><td>89</td><td><span lang="ar" dir="rtl">الفجر</span></td><td>Al-Fajr</td><td>The Dawn</td><td>30</td><td>Makkah</td></tr><tr><td>90</td><td><span lang="ar" dir="rtl">البلد</span></td><td>Al-Balad</td><td>The City</td><td>20</td><td>Makkah</td></tr><tr><td>91</td><td><span lang="ar" dir="rtl">الشمس</span></td><td>Ash-Shams</td><td>The Sun</td><td>15</td><td>Makkah</td></tr><tr><td>92</td><td><span lang="ar" dir="rtl">الليل</span></td><td>Al-Layl</td><td>The Night</td><td>21</td><td>Makkah</td></tr><tr><td>93</td><td><span lang="ar" dir="rtl">الضحى</span></td><td>Ad-Duha</td><td>The Morning Hours</td><td>11</td><td>Makkah</td></tr><tr><td>94</td><td><span lang="ar" dir="rtl">الشرح</span></td><td>Ash-Sharh</td><td>The Relief</td><td>8</td><td>Makkah</td></tr><tr><td>95</td><td><span lang="ar" dir="rtl">التين</span></td><td>At-Tin</td><td>The Fig</td><td>8</td><td>Makkah</td></tr><tr><td>96</td><td><span lang="ar" dir="rtl">العلق</span></td><td>Al-Alaq</td><td>The Clinging Clot</td><td>19</td><td>Makkah</td></tr><tr><td>97</td><td><span lang="ar" dir="rtl">القدر</span></td><td>Al-Qadr</td><td>The Night of Decree</td><td>5</td><td>Makkah</td></tr><tr><td>98</td><td><span lang="ar" dir="rtl">البينة</span></td><td>Al-Bayyinah</td><td>The Clear Evidence</td><td>8</td><td>Madinah</td></tr><tr><td>99</td><td><span lang="ar" dir="rtl">الزلزلة</span></td><td>Az-Zalzalah</td><td>The Earthquake</td><td>8</td><td>Madinah</td></tr><tr><td>100</td><td><span lang="ar" dir="rtl">العاديات</span></td><td>Al-Adiyat</td><td>The Chargers</td><td>11</td><td>Makkah</td></tr><tr><td>101</td><td><span lang="ar" dir="rtl">القارعة</span></td><td>Al-Qari'ah</td><td>The Striking Hour</td><td>11</td><td>Makkah</td></tr><tr><td>102</td><td><span lang="ar" dir="rtl">التكاثر</span></td><td>At-Takathur</td><td>Rivalry in Worldly Increase</td><td>8</td><td>Makkah</td></tr><tr><td>103</td><td><span lang="ar" dir="rtl">العصر</span></td><td>Al-Asr</td><td>The Declining Day</td><td>3</td><td>Makkah</td></tr><tr><td>104</td><td><span lang="ar" dir="rtl">الهمزة</span></td><td>Al-Humazah</td><td>The Slanderer</td><td>9</td><td>Makkah</td></tr><tr><td>105</td><td><span lang="ar" dir="rtl">الفيل</span></td><td>Al-Fil</td><td>The Elephant</td><td>5</td><td>Makkah</td></tr><tr><td>106</td><td><span lang="ar" dir="rtl">قريش</span></td><td>Quraysh</td><td>Quraysh</td><td>4</td><td>Makkah</td></tr><tr><td>107</td><td><span lang="ar" dir="rtl">الماعون</span></td><td>Al-Ma'un</td><td>Small Kindnesses</td><td>7</td><td>Makkah</td></tr><tr><td>108</td><td><span lang="ar" dir="rtl">الكوثر</span></td><td>Al-Kawthar</td><td>Abundance</td><td>3</td><td>Makkah</td></tr><tr><td>109</td><td><span lang="ar" dir="rtl">الكافرون</span></td><td>Al-Kafirun</td><td>The Disbelievers</td><td>6</td><td>Makkah</td></tr><tr><td>110</td><td><span lang="ar" dir="rtl">النصر</span></td><td>An-Nasr</td><td>The Divine Support</td><td>3</td><td>Madinah</td></tr><tr><td>111</td><td><span lang="ar" dir="rtl">المسد</span></td><td>Al-Masad</td><td>The Palm Fibre</td><td>5</td><td>Makkah</td></tr><tr><td>112</td><td><span lang="ar" dir="rtl">الإخلاص</span></td><td>Al-Ikhlas</td><td>Sincerity of Faith</td><td>4</td><td>Makkah</td></tr><tr><td>113</td><td><span lang="ar" dir="rtl">الفلق</span></td><td>Al-Falaq</td><td>The Daybreak</td><td>5</td><td>Makkah</td></tr><tr><td>114</td><td><span lang="ar" dir="rtl">الناس</span></td><td>An-Nas</td><td>Mankind</td><td>6</td><td>Makkah</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-mecca" alt="Pilgrims at the Great Mosque in Makkah" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"reading-further"} -->
<h2 class="wp-block-heading" id="reading-further">Reading further</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The longest surah, The Cow, has 286 verses; the shortest have three. The first revelation, according to the standard account, was the opening of The Clinging Clot, and the last complete surah revealed was The Divine Support. On the way the text was gathered and copied, see <a href="/reference/sacred-texts/">Sacred texts</a>. For its treatment of <a href="/journal/who-was-abraham/">Abraham</a>, see <a href="/journal/millat-ibrahim/">The Path of Abraham in the Qur'an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Continue with <a href="/reference/sacred-texts/tanakh/">The Tanakh</a> or <a href="/reference/sacred-texts/bible/">The Christian Bible</a>.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">See also: <a href="https://quran.com/">Quran.com</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:mandaeism', 'photo' => array( 'name' => 'page-mandaeism', 'alt' => 'Mandaeism on Abrahamic Religions' ), 'type' => 'page', 'slug' => 'mandaeism', 'title' => 'Mandaeism', 'parent' => 'page:guides',
			'excerpt' => 'The Mandaeans of Iraq and Iran, their scriptures and rites, and their identification with the Sabians of the Qur’an.', 'description' => 'Mandaeism, the baptismal faith of Iraq and Iran: its origins, beliefs, prophets and scriptures. Read the guide.', 'menu_order' => 4, 'special' => '', 'since' => 14,
			'content' => <<<'ABR_SEED'
<!-- wp:shortcode -->
[abr_darfash]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>Mandaeism is the religion of the Mandaeans, a community of southern Iraq and south-western Iran whose rituals turn on flowing water and whose greatest teacher is John the Baptist, known to them as Yahya Yuhana and to the Qur'an as <em>Yaḥyā ibn Zakariyyā</em> (<span lang="ar" dir="rtl">يحيى بن زكريا</span>, John son of Zechariah). Perhaps sixty to seventy thousand Mandaeans remain, most of them now in diaspora. It is the smallest of the four Abrahamic traditions, and the oldest surviving Gnostic religion in the world.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#origins">Mandaeism: origins</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#belief">Belief</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-prophets">The prophets</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-sabians-of-the-qur-an">The Sabians of the Qur'an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#scripture">Scripture</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#practice">Practice</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-community-today">The community today</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="mandaeism" alt="A Mandaean immersing in the Karun River at Ahvaz during masbuta, the rite of baptism in flowing water" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"origins"} -->
<h2 class="wp-block-heading" id="origins">Mandaeism: origins</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaean tradition traces the religion to Adam, who is held to have received the first revelation.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The community's own account of its history, preserved in a scroll copied and recopied by its priests, describes a departure from <a href="/journal/jerusalem-in-three-traditions/">Jerusalem</a>: sixty thousand Nasoraeans, it says, entered the Median hills, where they were free of foreign rule and built the cult huts they call <em>bimandia</em>, under a king the text names Ardban, the Artabanus of the Parthian line.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Copyists' colophons in the scriptures allow scholars to trace an unbroken chain of transmission to the second or third century, one of the longest attested for any religious literature. Scholars divide over whether the origins lie in Palestine, as the community's own histories say, or in Mesopotamia itself.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"belief"} -->
<h2 class="wp-block-heading" id="belief">Belief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The core doctrine is called <em>nāṣerutā</em>, and it is knowledge in the strict sense: the scrolls that carry it are handed to priests at ordination and withheld from laypeople and outsiders, which is why the community long resisted showing them to scholars.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> At its centre stands Adam Kasia, the hidden or secret Adam, the archetype of humanity of which each person is a counterpart, and whose gradual purification the rites enact.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Mandaeism is monotheist and Gnostic together. God is called <em>Hayyi Rabbi</em>, the Great Life, the source of the World of Light, and the created world stands between that world and the World of Darkness. The soul belongs to the world of light and is exiled in the body; salvation lies in the knowledge, <em>nāṣerutā</em>, transmitted through ritual and priesthood, by which the soul returns to its origin. Messengers of light, chief among them Manda d-Hayyi, descend to teach that knowledge.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-prophets"} -->
<h2 class="wp-block-heading" id="the-prophets">The prophets</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The prophetic line runs Adam, Abel, Seth, Enosh, Noah, Shem and Aram, and it closes with <a href="/journal/john-the-baptist/">John the Baptist</a>, whom Mandaeans regard as the greatest and the last. These are figures of the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a>, and they place the community in the same prophetic lineage from which the other three traditions draw.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The community parts from the others at <a href="/journal/who-was-abraham/">Abraham</a>. Mandaean teaching does not accept Abraham, <a href="/reference/figures/#moses">Moses</a>, Jesus or Muhammad as prophets, and reads Jesus as one who altered what John had taught him. Some Mandaean texts describe Abraham and Jesus as having once been priests of the community who broke from it. The site notes this plainly: Mandaeans belong to the Abrahamic family by descent, history and the prophets they share, and they do not accept the figure the family is named after.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-sabians-of-the-qur-an"} -->
<h2 class="wp-block-heading" id="the-sabians-of-the-qur-an">The Sabians of the Qur'an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The <a href="/reference/sacred-texts/quran/">Qur'an</a> names the <em>Ṣābiʾūn</em> (<span lang="ar" dir="rtl">الصابئون</span>, the Sabians) three times, in each case beside the Jews and the Christians as communities that receive God's reward if they believe in God and the last day and do right.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The identity of that community has been discussed by Muslim scholars since the earliest period; <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur'an</a> sets out their answers.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The community's own scroll records the meeting. It tells how one Anush son of Danqa came before the Arab ruler and explained the faith of his people, with the result that the Muslims were not permitted to harm the Nasoraeans living under that government.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>In the form the account takes elsewhere, Anush presented the Ginza Rabba to the Muslim authorities and named John the Baptist as the chief prophet of his community. The Mandaeans were recognised as the Sabians of the Qur'an, and so as <em>ahl al-kitāb</em> (<span lang="ar" dir="rtl">أهل الكتاب</span>, people of the book), a standing that carried protection, the right to their own law, and the survival of the community under Muslim rule for fourteen centuries. That identification has held to the present day, and it is the reason a small Gnostic community of late antiquity still exists.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Mandaean practice shows why the identification was accepted so readily. The community has a profession of faith, almsgiving, fasting, prayer at set times of day, washing before prayer, a day of judgement, and an opening formula answering to the <em>basmalah</em>. The differences are as plain: baptism in flowing water is repeated throughout life, the priesthood is hereditary, and the cosmology is dualist in a way that Islam is not.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"scripture"} -->
<h2 class="wp-block-heading" id="scripture">Scripture</h2>
<!-- /wp:heading -->

<!-- wp:table {"className":"abr-table"} -->
<figure class="wp-block-table abr-table"><table><thead><tr><th>Name</th><th>In Mandaic</th><th>What it holds</th></tr></thead><tbody><tr><td>Ginza Rabba</td><td>The Great Treasure</td><td>The principal scripture, in two parts: the Right Ginza on theology, creation and history, the Left Ginza on the soul's ascent</td></tr><tr><td>Qolasta</td><td>The Collection</td><td>The canonical prayer book, used in baptism and the rites for the dead</td></tr><tr><td>The Book of John</td><td>Drasha d-Yahya</td><td>The teachings of John the Baptist, including his exchanges with Jesus</td></tr><tr><td>The Thousand and Twelve Questions</td><td>Alf Trisar Shuialia</td><td>A priestly commentary on ritual</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>The scriptures are written in Mandaic, an eastern Aramaic dialect close to the Aramaic of the Babylonian Talmud, and preserved in its own script. The language survives in liturgy and, among some families in Iran, in speech.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"practice"} -->
<h2 class="wp-block-heading" id="practice">Practice</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><strong>The mandi</strong>, the sacred enclosure holding the pool and the cult hut, where the rites are performed.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Masbuta</strong>, baptism in flowing water, repeated on Sundays and at festivals, and required at marriage and after childbirth. Still water will not serve: the rite needs a river, called <em>yardna</em>, and each person is baptised individually. Most scholars take the word from the river Jordan, although E. S. Drower doubted the connection.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Prayer</strong> three times a day, facing north, the direction of the World of Light.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>The darfash</strong>, the banner of olive wood and white silk that stands beside the water at every rite, and the emblem of the community.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>A hereditary priesthood</strong>, whose ranks run from the <em>tarmida</em>, the priest, to the <em>ganzibra</em>, the head priest, and whose members alone may copy the scriptures and conduct the rites.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Strict pacifism</strong>: Mandaean law forbids killing and the carrying of weapons.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"the-community-today"} -->
<h2 class="wp-block-heading" id="the-community-today">The community today</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Mandaeans lived for centuries in the marshes and river towns of southern Iraq and Khuzestan in Iran. War, the draining of the marshes and the violence that followed 2003 scattered them, and the majority now live in Australia, Sweden, the United States and elsewhere. A community that numbered tens of thousands in Iraq alone is now counted in the low tens of thousands worldwide, which places it among the most endangered religious traditions in the world.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Continue with <a href="/religions/judaism/">Judaism</a>, <a href="/religions/christianity/">Christianity</a>, <a href="/religions/islam/">Islam</a> or the <a href="/reference/glossary/">Glossary</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">E. S. Drower, ed. and tr., The Haran Gawaita and the Baptism of Hibil-Ziwa (Vatican City: Biblioteca Apostolica Vaticana, 1953), p. 3. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">E. S. Drower, The Secret Adam: A Study of Nasoraean Gnosis (Oxford: Clarendon Press, 1960), pp. ix-x. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ibid., pp. 21-33. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><a href="https://quran.com/2/62">Qur'an 2:62</a>; 5:69; 22:17. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">E. S. Drower, ed. and tr., The Haran Gawaita and the Baptism of Hibil-Ziwa (Vatican City: Biblioteca Apostolica Vaticana, 1953), pp. 15-16. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), p. xiv. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibid., pp. xiii-xiv. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Eric Segelberg, Maṣbūtā: Studies in the Ritual of the Mandaean Baptism (Uppsala: Almqvist &amp; Wiksells, 1958), p. 38 and n. 2. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:who-was-abraham', 'photo' => array( 'name' => 'ur-ziggurat', 'alt' => 'Who was Abraham? The ziggurat of Ur in southern Iraq, the city Genesis names as the home of Abraham' ), 'type' => 'post', 'slug' => 'who-was-abraham', 'title' => 'Who was Abraham?',
			'excerpt' => 'The historical and theological figure of Abraham across the traditions, and why Mandaeism parts from him.', 'description' => 'Who was Abraham? The father of the faithful in the Bible, the Qur’an and Mandaean belief, and why it matters. Read more.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 160, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Who was Abraham, the man three faiths call their father? Abraham stands at the head of three religious traditions. Jews call him <em>Avraham avinu</em>, "our father Abraham"; Christians honour him as the father of all who believe; Muslims revere Ibrāhīm as a prophet and the builder of the Kaaba. Who was he, and why does he matter so much?</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-biblical-account">The biblical account</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#abraham-in-jewish-tradition">Abraham in Jewish tradition</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#abraham-in-christian-tradition">Abraham in Christian tradition</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#ibrahim-in-the-qur-an">Ibrāhīm in the Qur'an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#abraham-in-mandaean-tradition">Abraham in Mandaean tradition</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-historical-question">The historical question</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-brief">Who was Abraham? In brief</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-biblical-account"} -->
<h2 class="wp-block-heading" id="the-biblical-account">The biblical account</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The book of Genesis tells how Abram, later renamed Abraham, left Ur of the Chaldeans with his family, settled for a time in Harran, and then travelled to Canaan at God's command. God promised him land, many descendants, and a blessing that would reach all the families of the earth.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The covenant was sealed with circumcision and described as everlasting, binding God to Abraham and to his offspring after him.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Sarah, long childless, bore Isaac in old age; Hagar, Sarah's servant, bore <a href="/reference/figures/#ishmael">Ishmael</a>. The narrative reaches its most searching moment when God commands Abraham to offer his son as a sacrifice and then stays his hand.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"abraham-in-jewish-tradition"} -->
<h2 class="wp-block-heading" id="abraham-in-jewish-tradition">Abraham in Jewish tradition</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Rabbinic literature expands the biblical story. One well-known tradition tells how the young Abraham recognised the one God and broke his father's idols. Jewish thought treats him as the first to proclaim God's oneness, as a model of hospitality and of faithfulness under trial, and as the founding patriarch of the people of Israel. Those who enter the covenant by conversion are called sons and daughters of Abraham and Sarah.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"abraham-in-christian-tradition"} -->
<h2 class="wp-block-heading" id="abraham-in-christian-tradition">Abraham in Christian tradition</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The <a href="/reference/sacred-texts/bible/">New Testament</a> presents Abraham as the example of faith. The apostle Paul argues that Abraham was counted righteous because he trusted God's promise, and that all who share that faith, Jew or Gentile, are his children.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> In this reading the covenant is defined by faith, and Abraham becomes a spiritual ancestor as well as a figure in the genealogy of Jesus.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ibrahim-in-the-qur-an"} -->
<h2 class="wp-block-heading" id="ibrahim-in-the-qur-an">Ibrāhīm in the Qur'an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The <a href="/reference/sacred-texts/quran/">Qur'an</a> calls Ibrāhīm a <em>ḥanīf</em> (<span lang="ar" dir="rtl">حنيف</span>, pure monotheist) and <em>khalīl Allāh</em> (<span lang="ar" dir="rtl">خليل الله</span>, friend of God). It describes his rejection of his people's idols, his trial by fire, and his raising of the foundations of the Kaaba in <a href="/reference/places/#makkah">Makkah</a> with Ismāʿīl.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Because the Torah and the Gospel came after him, the Qur'an holds that he belonged to neither community and calls him a <em>muslim</em>, one who submitted to God.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Qur'an does not name the son in the sacrifice narrative; most later Muslim scholars identified him as Ismāʿīl. The annual festival of <em>ʿĪd al-Aḍḥā</em> (<span lang="ar" dir="rtl">عيد الأضحى</span>, the festival of sacrifice) commemorates Abraham's obedience, and the Qur'an calls Muslims to follow his path, a theme treated in <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur'an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"abraham-in-mandaean-tradition"} -->
<h2 class="wp-block-heading" id="abraham-in-mandaean-tradition">Abraham in Mandaean tradition</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Of the four traditions, Mandaeism alone does not honour Abraham. Its line of prophets runs from Adam through Seth, Noah and Shem and closes with <a href="/journal/john-the-baptist/">John the Baptist</a>; Abraham has no place in it, and some Mandaean texts describe him as a former priest of the community who broke away from it. The Mandaeans belong to the Abrahamic family by the prophets they share with it and by their history, and they part from the others at the figure the family is named after. See <a href="/religions/mandaeism/">Mandaeism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-historical-question"} -->
<h2 class="wp-block-heading" id="the-historical-question">The historical question</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>[abr_photo name="oak-mamre" alt="Abraham’s Oak near Hebron, traditionally linked to the terebinths of Mamre in Genesis" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="beersheba" alt="The excavated site of ancient Beersheba, associated with Abraham in Genesis 21" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>No inscription or document outside scripture mentions Abraham, and historians do not agree on whether, or when, a historical figure lies behind the narratives. Traditional chronologies place him early in the second millennium BCE. Some scholars read the stories as reflecting later periods of Israel's history, when the memory of a common ancestor served to bind tribes together. What is beyond dispute is the figure's influence: more than half of humanity belongs to a tradition that looks back to him.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-brief"} -->
<h2 class="wp-block-heading" id="in-brief">Who was Abraham? In brief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Who was Abraham? He was the man from Mesopotamia whom God called to leave his people and their idols, the father of Ishmael and Isaac, and the forefather whom Jews, Christians and Muslims all claim. For the Qur’an he was neither Jew nor Christian but a <em>ḥanīf</em>, devoted to the one God, and the builder with Ishmael of the Kaaba.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/who-was-kedar/">Kedar, the Arabs and the prophets</a> and <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>, <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/abrahamic-family-tree/">The Abrahamic family tree and what the traditions share</a>, <a href="/journal/the-stations-of-the-hajj/">The stations of the Hajj</a>, <a href="/journal/what-language-did-abraham-speak/">What language did Abraham speak?</a>, <a href="/journal/where-was-abraham-from/">Where was Abraham from?</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Genesis 12:1-3. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Genesis 17:7-14. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Romans 4:9-12; Galatians 3:7. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><a href="https://quran.com/2/127">Qur'an 2:127</a>; 21:51-70; 3:67. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:how-the-abrahamic-religions-understand-monotheism', 'photo' => array( 'name' => 'ten-commandments', 'alt' => 'Monotheism: the Ten Commandments in Deuteronomy on a page of the Aleppo Codex' ), 'type' => 'post', 'slug' => 'abrahamic-monotheism', 'title' => 'How the Abrahamic religions understand monotheism',
			'excerpt' => 'A comparative look at the concept of one God in Judaism, Mandaeism, Christianity and Islam.', 'description' => 'Monotheism in Judaism, Mandaeism, Christianity and Islam: the one God, tawhid and the Trinity compared. Read the guide.', 'categories' => array( 'theology', 'religion' ), 'days_ago' => 130, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Monotheism, belief in one God alone, is the conviction the Abrahamic religions share. Judaism, Mandaeism, Christianity and Islam each confess one God. Yet they express that belief in different ways, and the differences have shaped centuries of debate. Each tradition has also had to explain how the one God relates to the world He made, to the revelation He sent, and to the prophets and messengers who carried it.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#judaism-the-shema">Judaism: the Shema</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#christianity-the-trinity">Christianity: the Trinity</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#islam-tawhid">Islam: tawḥīd</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mandaeism-the-great-life">Mandaeism: the Great Life</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#points-of-disagreement">Points of disagreement</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#common-ground">Common ground</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#more-on-this-subject">More on monotheism</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"judaism-the-shema"} -->
<h2 class="wp-block-heading" id="judaism-the-shema">Judaism: the Shema</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The central declaration of Jewish faith begins, "Hear, O Israel: the Lord is our God, the Lord is one." Recited morning and evening, the Shema affirms that God is one and unique. The medieval philosopher Maimonides counted belief in God's absolute unity among the foundational principles of <a href="/religions/judaism/">Judaism</a> and taught that God has no body and no likeness.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"christianity-the-trinity"} -->
<h2 class="wp-block-heading" id="christianity-the-trinity">Christianity: the Trinity</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christians also affirm one God, but understand that one God as existing eternally in three persons: Father, Son and Holy Spirit. The doctrine took formal shape at the councils of Nicaea in 325 and Constantinople in 381, as the church sought to account for its worship of Jesus as divine without abandoning monotheism. Christian theologians insist that the three persons share one divine nature and are not three gods.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"islam-tawhid"} -->
<h2 class="wp-block-heading" id="islam-tawhid">Islam: tawḥīd</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Islamic theology is built on <em>tawḥīd</em> (<span lang="ar" dir="rtl">توحيد</span>, oneness), the absolute unity of God. The <a href="/reference/sacred-texts/quran/">Qur'an</a> declares that God is one, eternal, neither begetting nor begotten, and without equal. Its opposite is <em>shirk</em> (<span lang="ar" dir="rtl">شرك</span>, association), ascribing partners to God, which <a href="/religions/islam/">Islam</a> regards as the gravest sin. Muslim theologians developed detailed discussions of God's names and attributes and of how they relate to God's unity.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mandaeism-the-great-life"} -->
<h2 class="wp-block-heading" id="mandaeism-the-great-life">Mandaeism: the Great Life</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeans call God <em>Hayyi Rabbi</em>, the Great Life, the source of the World of Light. Below it lies a World of Darkness, and the created world stands between the two. The human soul belongs to the light and is exiled in the body; it returns to its source through <em>nāṣerutā</em>, the knowledge carried by the rites and the priesthood. Mandaean monotheism is therefore joined to a dualism of light and darkness that the other three traditions reject. See <a href="/religions/mandaeism/">Mandaeism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"points-of-disagreement"} -->
<h2 class="wp-block-heading" id="points-of-disagreement">Points of disagreement</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jewish and Muslim thinkers have historically questioned whether the doctrine of the Trinity is compatible with strict monotheism. Christian thinkers have answered that the Trinity describes the inner life of the one God and does not divide it. Muslims and Christians also differ over the identity of Jesus: <a href="/religions/christianity/">Christianity</a> confesses him as the incarnate Son of God, while Islam honours him as a prophet and a servant of God.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"common-ground"} -->
<h2 class="wp-block-heading" id="common-ground">Common ground</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The traditions agree that God is the sole creator, is just and merciful, speaks to humanity through prophets, and will judge the world. Much <a href="/journal/interfaith-dialogue/">interfaith conversation</a> starts from these shared affirmations while taking the differences seriously.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Judaism and Islam state the principle in its least qualified form: one God, without partner or likeness. The Qur'an adds a claim of its own, presenting that confession as the faith of <a href="/journal/who-was-abraham/">Abraham</a> himself, which is why Muslims describe their religion as the restoration of the monotheism from which the whole family takes its name. See <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur'an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"more-on-this-subject"} -->
<h2 class="wp-block-heading" id="more-on-this-subject">More on monotheism</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/prayer-in-abrahamic-traditions/">Prayer across the Abrahamic traditions</a> and <a href="/journal/faith-and-reason/">Faith and reason in medieval Jewish, Christian and Muslim thought</a>, <a href="/journal/ibn-rushd-and-al-ghazali/">Al-Ghazali, Ibn Rushd and the limits of reason</a>, <a href="https://www.britannica.com/topic/monotheism">Monotheism (Encyclopaedia Britannica)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="torah-ark" alt="A synagogue Torah ark, housing the scrolls read in the Shema’s own tradition" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="trinity-symbol" alt="A triquetra, a traditional symbol of the Christian Trinity" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

ABR_SEED,
		),
		array(
			'key' => 'post:understanding-the-bible-and-the-quran-in-historical-context', 'photo' => array( 'name' => 'birmingham-quran', 'alt' => 'Historical context for scripture: the Bible and the Qur’an: early Qur\'anic leaves of the Birmingham manuscript in Hijazi script' ), 'type' => 'post', 'slug' => 'bible-quran-historical-context', 'title' => 'Understanding the Bible and the Qur’an in historical context',
			'excerpt' => 'How scholars approach the historical and literary settings of these sacred texts.', 'description' => 'The Bible and the Qur’an in historical context: how each was received, written down and read. Read the guide.', 'categories' => array( 'scripture' ), 'days_ago' => 100, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Read in historical context, the Bible and the Qur’an are best understood in the history that produced them. Believers read scripture as revelation. Historians ask a further set of questions: when were these texts written down, by whom, in what circumstances, and how were they transmitted? The two ways of reading can inform each other. Reading either scripture in this way asks how it was received by its first hearers, and how the questions of their time shaped the words that were preserved.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-hebrew-bible">The Hebrew Bible</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-new-testament">The New Testament</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-qur-an">The Qur'an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#reading-in-context">Reading in historical context</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-hebrew-bible"} -->
<h2 class="wp-block-heading" id="the-hebrew-bible">The Hebrew Bible</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The books of the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a> were composed and edited over many centuries. Modern scholarship has proposed that the Torah combines earlier sources, a view developed in the nineteenth century and much revised since. The Dead Sea Scrolls, discovered near Qumran from 1947 onwards, include manuscripts of nearly every book of the Hebrew Bible and date from roughly the third century BCE to the first century CE. They show both a remarkable continuity with the later standard text and a degree of variety in the period before it was fixed.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-new-testament"} -->
<h2 class="wp-block-heading" id="the-new-testament">The New Testament</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The <a href="/reference/sacred-texts/bible/">New Testament</a> books were written in Greek in the first century and the early second century CE. Most scholars date Paul's letters to the 50s CE, making them the earliest Christian writings, and the Gospels to the following decades. Thousands of Greek manuscripts survive, the oldest being small papyrus fragments from the second century. Textual critics compare them to reconstruct the earliest recoverable text.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-qur-an"} -->
<h2 class="wp-block-heading" id="the-qur-an">The Qur'an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muslim tradition holds that the <a href="/reference/sacred-texts/quran/">Qur'an</a> was revealed to Muhammad between about 610 and 632 CE, and that a standard written text was established under the caliph ʿUthmān around 650. Early manuscripts, some written on parchment that radiocarbon testing places in the seventh century, have allowed scholars to study the text's early history.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Two leaves held by the University of Birmingham, carrying parts of sūrahs 18 to 20 in the early Hijazi script, were tested at Oxford in 2014: the parchment dates, with 95.4 per cent probability, to between 568 and 645 CE, a range that overlaps the lifetime of the Prophet.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The interval between the revelation and its earliest surviving copies is therefore a matter of decades. Muslim scholarship has its own long tradition of historical inquiry, including the study of <em>asbāb al-nuzūl</em> (<span lang="ar" dir="rtl">أسباب النزول</span>, occasions of revelation), the circumstances in which particular passages were revealed.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"reading-in-context"} -->
<h2 class="wp-block-heading" id="reading-in-context">Reading in historical context</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Historical context can illuminate a passage: the customs it assumes, the audience it addresses, the questions it answers. Traditions differ in how much weight they give such readings. For many believers, historical study deepens understanding of texts they hold to be revealed; for others, it raises questions that call for careful theological response.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>, <a href="/journal/john-the-baptist/">John the Baptist in four traditions</a> and <a href="/journal/archaeology-and-scripture/">What archaeology tells us about the ancient Near East</a>, <a href="/journal/transmission-of-scripture/">The preservation and transmission of scripture</a> and <a href="/journal/mary-across-the-traditions/">Mary across the traditions</a>, <a href="/journal/paul-and-peter-two-missions/">Paul and Peter: two missions in the early church</a>, <a href="https://www.britannica.com/topic/Bible">The Bible (Encyclopaedia Britannica)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="papyrus52" alt="Papyrus 52, a fragment of the Gospel of John held by the John Rylands Library, among the earliest known New Testament manuscripts" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="codex-sinaiticus" alt="A page of the fourth-century Codex Sinaiticus, one of the earliest surviving manuscripts of the New Testament" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the Bible and the Qur’an</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">University of Birmingham, "Birmingham Qur'an manuscript dated among the oldest in the world", press release, 22 July 2015; Cadbury Research Library, Islamic Arabic 1572a. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:jerusalem-in-three-traditions', 'photo' => array( 'name' => 'jerusalem-panorama', 'alt' => 'The Old City of Jerusalem from the Mount of Olives, with the Dome of the Rock above the walls' ), 'type' => 'post', 'slug' => 'jerusalem-in-three-traditions', 'title' => 'Jerusalem in three traditions',
			'excerpt' => 'Why one city holds a central place in Judaism, Christianity and Islam.', 'description' => 'Temple, tomb and Night Journey: why Jerusalem matters to Jews, Christians and Muslims. Read the full story.', 'categories' => array( 'history' ), 'days_ago' => 75, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Few places carry as much religious meaning as Jerusalem. For three thousand years it has been a focus of prayer, pilgrimage and conflict, and the ground at its centre, the Temple Mount or al-Ḥaram al-Sharīf (<span lang="ar" dir="rtl">الحرم الشريف</span>, the Noble Sanctuary), is claimed by more than one tradition at once.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-city-of-david-and-the-temple">The city of David and the Temple</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-city-of-the-cross-and-the-empty-tomb">The city of the cross and the empty tomb</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-city-of-the-night-journey">The city of the Night Journey</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-shared-and-contested-city">A shared and contested city</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-city-of-david-and-the-temple"} -->
<h2 class="wp-block-heading" id="the-city-of-david-and-the-temple">The city of David and the Temple</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>According to the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a>, King <a href="/reference/figures/#david">David</a> made Jerusalem his capital around 1000 BCE, and his son Solomon built the First Temple there. The Babylonians destroyed it in 586 BCE. The Second Temple, completed in 516 BCE and rebuilt on a grand scale by Herod the Great, stood until the Roman destruction of 70 CE. The Western Wall, part of Herod's retaining wall, is today the holiest place where Jews pray. Jewish law gives the city a standing no other place holds: prayer outside it is directed towards it, and the liturgy keeps the hope of return to Zion in daily use.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-jerusalem" alt="Worshippers at the Western Wall in Jerusalem" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-city-of-the-cross-and-the-empty-tomb"} -->
<h2 class="wp-block-heading" id="the-city-of-the-cross-and-the-empty-tomb">The city of the cross and the empty tomb</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christians remember Jerusalem as the place where Jesus taught in the Temple courts, was arrested, crucified and, they believe, rose from the dead. The Last Supper, the trial, the crucifixion and the resurrection all belong to this city, which is why it has drawn pilgrims from the earliest centuries. In the fourth century the emperor Constantine built a church over the traditional site of the tomb, the origin of today's Church of the Holy Sepulchre, whose custody several ancient churches share.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-city-of-the-night-journey"} -->
<h2 class="wp-block-heading" id="the-city-of-the-night-journey">The city of the Night Journey</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muslims call the city al-Quds (<span lang="ar" dir="rtl">القدس</span>, the Holy) and count it the third holiest after <a href="/reference/places/#makkah">Makkah</a> and Madinah. The <a href="/reference/sacred-texts/quran/">Qur'an</a> speaks of God carrying his servant by night to "the farthest mosque", which Muslim tradition identifies with Jerusalem; from there, tradition holds, the Prophet was raised through the heavens.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Jerusalem was also the first <em>qiblah</em> (<span lang="ar" dir="rtl">قبلة</span>, direction of prayer) before the direction turned to Makkah.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The Dome of the Rock, completed in 691 or 692 under the Umayyad caliph ʿAbd al-Malik, and the nearby al-Aqṣā Mosque stand on the sanctuary today, and the city is remembered in Muslim tradition as a city of prophets.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-shared-and-contested-city"} -->
<h2 class="wp-block-heading" id="a-shared-and-contested-city">A shared and contested city</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jerusalem passed through Byzantine, early Islamic, Crusader, Ayyubid, Mamluk and Ottoman rule before the modern era, and the twentieth century added new divisions and claims. Its sacred sites lie within a few hundred metres of one another, and questions of access and sovereignty remain among the most sensitive in the world. Understanding what the city means to each tradition is a first step toward understanding why.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/interfaith-dialogue/">Interfaith dialogue in the modern era</a>, <a href="/journal/archaeology-and-scripture/">What archaeology tells us about the ancient Near East</a> and <a href="/journal/who-was-abraham/">Who was Abraham?</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="dome-of-rock" alt="The Dome of the Rock on the Temple Mount in Jerusalem" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Jerusalem</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/17/1">Qur'an 17:1</a>. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur'an 2:142-144. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:prayer-across-the-abrahamic-traditions', 'photo' => array( 'name' => 'prayer', 'alt' => 'Prayer in the Abrahamic traditions: a worshipper with raised arms against the evening sky' ), 'type' => 'post', 'slug' => 'prayer-in-abrahamic-traditions', 'title' => 'Prayer across the Abrahamic traditions',
			'excerpt' => 'Daily prayer in Judaism, Mandaeism, Christianity and Islam: times, forms and meanings.', 'description' => 'Prayer in the Abrahamic traditions: daily prayer in Judaism, Christianity, Islam and Mandaeism compared. Read the guide.', 'categories' => array( 'culture' ), 'days_ago' => 50, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Prayer shapes the daily rhythm of believers in all four Abrahamic traditions. The forms differ, yet each tradition treats prayer as both a personal turning to God and a shared act of the community.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#jewish-prayer">In Judaism</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#christian-prayer">In Christianity</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#muslim-prayer">In Islam</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mandaean-prayer">In Mandaeism</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#shared-threads">Shared threads</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"jewish-prayer"} -->
<h2 class="wp-block-heading" id="jewish-prayer">In Judaism</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jewish law sets three daily services: <em>Shacharit</em> in the morning, <em>Mincha</em> in the afternoon and <em>Maariv</em> in the evening. At their centre is the <em>Amidah</em>, a series of blessings recited standing. Certain prayers require a <em>minyan</em>, a quorum of ten adults. The synagogue service follows the prayer book, and the Torah is read publicly on Sabbaths, festivals and certain weekdays.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"christian-prayer"} -->
<h2 class="wp-block-heading" id="christian-prayer">In Christianity</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christians pray privately and together. The Lord's Prayer, which the Gospels record Jesus teaching his disciples, is common to nearly all churches. Many Catholic, Orthodox and Anglican Christians keep a daily cycle of set prayers, such as the Liturgy of the Hours, and the Eucharist stands at the heart of worship. Protestant traditions place strong emphasis on personal prayer, hymns and the reading of scripture.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"muslim-prayer"} -->
<h2 class="wp-block-heading" id="muslim-prayer">In Islam</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muslims perform <em>ṣalāh</em> (<span lang="ar" dir="rtl">صلاة</span>, ritual prayer) five times daily: at dawn, midday, afternoon, sunset and night. Before praying they perform <em>wuḍūʾ</em> (<span lang="ar" dir="rtl">وضوء</span>, ablution), and they face the Kaaba in <a href="/reference/places/#makkah">Makkah</a>. Each consists of cycles of standing, bowing, prostration and sitting, with recitation from the <a href="/reference/sacred-texts/quran/">Qur'an</a> in Arabic. On Fridays, Muslims gather for the congregational prayer, <em>jumuʿah</em> (<span lang="ar" dir="rtl">جمعة</span>, Friday prayer), with a sermon.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mandaean-prayer"} -->
<h2 class="wp-block-heading" id="mandaean-prayer">In Mandaeism</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Mandaean <em>rahmi</em> is said facing the North Star, behind which, in Mandaean belief, Abathur has his throne; the north is the direction of the World of Light. Each day of the week carries its own prayers, and a priest recites them before he baptises.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Baptism itself, repeated through life in running water, is the community's central act of worship. See <a href="/religions/mandaeism/">Mandaeism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"shared-threads"} -->
<h2 class="wp-block-heading" id="shared-threads">Shared threads</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>[abr_photo name="mihrab-isfahan" alt="A mihrab, the niche indicating the direction of prayer, in Isfahan, Iran" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="western-wall" alt="Worshippers at the Western Wall in Jerusalem" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The four traditions share postures such as bowing and prostration, a sense of sacred time, and prayers of praise, thanksgiving and petition. Each also sets aside a weekly day of special worship: the Sabbath, Sunday and Friday; Mandaeans, too, keep Sunday, the first day of the week.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/abrahamic-monotheism/">How the Abrahamic religions understand monotheism</a>, <a href="/journal/masbuta-baptism-in-running-water/">Masbuta: baptism in running water</a> and <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur’an</a>, <a href="https://www.britannica.com/topic/prayer">Prayer (Encyclopaedia Britannica)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on prayer in the Abrahamic traditions</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), p. 110. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:what-archaeology-tells-us-about-the-ancient-near-east', 'photo' => array( 'name' => 'megiddo', 'alt' => 'Archaeology: tel Megiddo from the air, above the Jezreel Valley' ), 'type' => 'post', 'slug' => 'archaeology-and-scripture', 'title' => 'What archaeology tells us about the ancient Near East',
			'excerpt' => 'Inscriptions, excavations and the limits of the evidence for the world of the Bible and early Islam.', 'description' => 'Inscriptions, excavations and the limits of the evidence for the biblical world. See what archaeology shows.', 'categories' => array( 'archaeology', 'history' ), 'days_ago' => 35, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Archaeology gives historians material evidence to set beside written sources. For the world of the Abrahamic scriptures, that evidence is plentiful in places and silent in others. Archaeology rarely proves or disproves a scripture outright; what it offers is a picture of the world in which the scriptures were written, against which their accounts can be read.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#inscriptions-that-name-israel">Inscriptions that name Israel</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-second-temple-period-and-early-christianity">The Second Temple period and early Christianity</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#early-islam">Early Islam</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-limits-of-the-evidence">The limits of the evidence</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#more-on-this-subject">More on archaeology</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"inscriptions-that-name-israel"} -->
<h2 class="wp-block-heading" id="inscriptions-that-name-israel">Inscriptions that name Israel</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Merneptah Stele, an Egyptian victory inscription from around 1208 BCE, contains the earliest known mention of a people called Israel. The Mesha Stele, a ninth-century BCE monument of a king of Moab, refers to Israel and its god. The Tel Dan inscription, found in northern Israel in the 1990s and dated to the ninth century BCE, contains a phrase that most scholars read as "House of <a href="/reference/figures/#david">David</a>", widely taken as the earliest reference to David's dynasty outside the Bible.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-second-temple-period-and-early-christianity"} -->
<h2 class="wp-block-heading" id="the-second-temple-period-and-early-christianity">The Second Temple period and early Christianity</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Excavations in Jerusalem have uncovered streets, ritual baths and parts of the Temple Mount complex from the Herodian period. A stone found at Caesarea in 1961 bears the name of Pontius Pilate, the Roman governor named in the Gospels. Discoveries such as these illuminate the world in which <a href="/religions/judaism/">Judaism</a> and the early Christian movement developed.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"early-islam"} -->
<h2 class="wp-block-heading" id="early-islam">Early Islam</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The inscriptions inside the Dome of the Rock, dated to the 690s, are among the earliest extensive Qur'anic texts in stone. Early Arabic rock inscriptions and papyri from the seventh century document the spread of Arabic writing and of Islamic administration.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-limits-of-the-evidence"} -->
<h2 class="wp-block-heading" id="the-limits-of-the-evidence">The limits of the evidence</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Archaeology cannot confirm or deny every narrative. No excavation has produced direct evidence of the patriarchs, and the absence of evidence may reflect what survives in the ground and what has been excavated. Scholars also disagree about how to interpret many finds. Archaeology is best read as one voice among several, alongside texts, languages and the living memory of the traditions.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"more-on-this-subject"} -->
<h2 class="wp-block-heading" id="more-on-this-subject">More on archaeology</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a> and <a href="/journal/jerusalem-in-three-traditions/">Jerusalem in three traditions</a>, <a href="/journal/the-cairo-genizah/">The Cairo Genizah</a>, <a href="https://www.britannica.com/place/Ur-ancient-city-Iraq">Ur (Encyclopaedia Britannica)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="merneptah-stele" alt="The Merneptah Stele, an Egyptian inscription from around 1208 BCE carrying the earliest known reference to Israel" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="lachish-relief" alt="An Assyrian relief from Nineveh depicting the siege of Lachish, now in the British Museum" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

ABR_SEED,
		),
		array(
			'key' => 'post:faith-and-reason-in-medieval-thought', 'photo' => array( 'name' => 'cordoba', 'alt' => 'Faith and reason: horseshoe arches inside the Great Mosque of Córdoba' ), 'type' => 'post', 'slug' => 'faith-and-reason', 'title' => 'Faith and reason in medieval Jewish, Christian and Muslim thought',
			'excerpt' => 'How medieval thinkers in all three traditions used Greek philosophy to reason about God.', 'description' => 'Faith and reason in medieval thought: how Jewish, Christian and Muslim thinkers joined revelation and philosophy. Read on.', 'categories' => array( 'philosophy', 'theology' ), 'days_ago' => 20, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Faith and reason were the great question of medieval thought. Between the ninth and the thirteenth centuries, Jewish, Christian and Muslim thinkers took up the philosophy of ancient Greece and asked how reason relates to revelation. Their conversation crossed religious and linguistic borders.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-translation-movement">The translation movement</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#muslim-philosophers-and-theologians">Muslim philosophers and theologians</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#jewish-thinkers">Jewish thinkers</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#christian-thinkers">Christian thinkers</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-shared-inheritance">A shared inheritance</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#more-on-this-subject">More on faith and reason</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-translation-movement"} -->
<h2 class="wp-block-heading" id="the-translation-movement">The translation movement</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In ninth-century Baghdad, scholars translated works by Aristotle, Plato and Greek physicians into Arabic, often by way of Syriac. This movement gave Arabic-speaking thinkers access to the Greek philosophical tradition and set the stage for centuries of debate.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"muslim-philosophers-and-theologians"} -->
<h2 class="wp-block-heading" id="muslim-philosophers-and-theologians">Muslim philosophers and theologians</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Al-Kindī, often called the first philosopher of the Arabs, argued that philosophy and revelation lead to the same truth. Al-Fārābī and Ibn Sīnā, known in Latin as Avicenna, built comprehensive systems of logic, metaphysics and psychology. Al-Ghazālī criticised some philosophical positions as incompatible with Islamic belief while adopting logic as a tool of theology. Ibn Rushd, known as Averroes, defended philosophy and wrote extensive commentaries on Aristotle.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"jewish-thinkers"} -->
<h2 class="wp-block-heading" id="jewish-thinkers">Jewish thinkers</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Saadia Gaon, writing in Judeo-Arabic in the tenth century, argued that reason and revelation agree. Moses Maimonides, born in Córdoba in 1138, sought to reconcile Aristotelian philosophy with the Torah and wrote on the limits of human language about God.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"christian-thinkers"} -->
<h2 class="wp-block-heading" id="christian-thinkers">Christian thinkers</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In the Latin West, Anselm of Canterbury described theology as "faith seeking understanding". Translations made in twelfth-century Toledo brought Aristotle, Ibn Sīnā and Ibn Rushd into Latin. Thomas Aquinas drew on them, and on Maimonides, as he set out his account of the relationship between faith and reason.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-shared-inheritance"} -->
<h2 class="wp-block-heading" id="a-shared-inheritance">A shared inheritance</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>These thinkers disagreed on much, but they shared a set of questions: whether the world had a beginning, how God can know particulars, and what human reason can grasp of God. Their exchange is one of the clearest examples of intellectual contact among the Abrahamic traditions. Much of the Aristotle that Latin Europe read in the twelfth and thirteenth centuries reached it through Arabic, in translation and in the commentaries of Muslim philosophers, so that Christian scholasticism took shape in part on foundations laid in Baghdad and Córdoba.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"more-on-this-subject"} -->
<h2 class="wp-block-heading" id="more-on-this-subject">More on faith and reason</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/abrahamic-monotheism/">How the Abrahamic religions understand monotheism</a>, <a href="/journal/interfaith-dialogue/">Interfaith dialogue in the modern era</a> and <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/ibn-rushd-and-al-ghazali/">Al-Ghazali, Ibn Rushd and the limits of reason</a>, <a href="https://plato.stanford.edu/entries/medieval-philosophy/">Medieval philosophy (Stanford Encyclopedia of Philosophy)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="toledo-school" alt="The building of the former School of Translators in Toledo, where Arabic philosophy entered Latin Europe" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="aquinas-manuscript" alt="A page of Thomas Aquinas’ Summa theologiae, whose author engaged closely with Ibn Rushd’s commentaries" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

ABR_SEED,
		),
		array(
			'key' => 'post:interfaith-dialogue-in-the-modern-era', 'photo' => array( 'name' => 'place-hebron', 'alt' => 'Interfaith dialogue: the shrine over the Cave of the Patriarchs in Hebron, shared by a mosque and a synagogue' ), 'type' => 'post', 'slug' => 'interfaith-dialogue', 'title' => 'Interfaith dialogue in the modern era',
			'excerpt' => 'How Jews, Christians and Muslims have sought understanding across religious lines since the nineteenth century.', 'description' => 'From Chicago in 1893 to church and Muslim initiatives today. Read how modern interfaith dialogue developed.', 'categories' => array( 'interfaith-studies' ), 'days_ago' => 8, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Interfaith dialogue between Jews, Christians and Muslims is, as an organised practice, largely a creation of the last century. Encounters among Jews, Christians and Muslims are as old as the traditions themselves. Organised dialogue aimed at mutual understanding is largely a development of the last two centuries. The Second Vatican Council’s declaration on other religions in 1965 is often taken as its starting point.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#early-milestones">Early milestones</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#changes-in-church-teaching">Changes in church teaching</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#muslim-initiatives">Muslim initiatives</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#forms-of-dialogue">Forms of dialogue</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#aims-and-limits">Aims and limits</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#more-on-this-subject">More on interfaith dialogue</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"early-milestones"} -->
<h2 class="wp-block-heading" id="early-milestones">Early milestones</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The World's Parliament of Religions, held in Chicago in 1893, brought representatives of many faiths to one platform and is often cited as the beginning of the modern interfaith movement. In the twentieth century, organisations dedicated to Jewish and Christian understanding formed in several countries, and the experience of the Holocaust led many churches to re-examine their teaching about <a href="/religions/judaism/">Judaism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"changes-in-church-teaching"} -->
<h2 class="wp-block-heading" id="changes-in-church-teaching">Changes in church teaching</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In 1965 the Second Vatican Council issued a declaration on the relation of the Catholic Church to non-Christian religions. It rejected the charge that the Jewish people as a whole bear responsibility for the death of Jesus and spoke with respect of Muslims as worshippers of the one God. Many Protestant and Orthodox bodies have issued their own statements since.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"muslim-initiatives"} -->
<h2 class="wp-block-heading" id="muslim-initiatives">Muslim initiatives</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In 2007, a group of Muslim scholars and leaders addressed an open letter to Christian leaders, proposing love of God and love of neighbour as common ground between the two faiths. The letter drew many responses and led to a series of conferences.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"forms-of-dialogue"} -->
<h2 class="wp-block-heading" id="forms-of-dialogue">Forms of dialogue</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><strong>Dialogue of life</strong>: neighbours of different faiths sharing daily life and civic concerns.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Dialogue of action</strong>: cooperation on social causes such as relief work.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Theological dialogue</strong>: scholars comparing beliefs and practices.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Shared reading</strong>: Jews, Christians and Muslims studying their scriptures together.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"aims-and-limits"} -->
<h2 class="wp-block-heading" id="aims-and-limits">Aims and limits</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Dialogue seeks understanding and respect; it does not require participants to set aside their convictions. Participants often find that honest discussion of differences builds deeper trust than a focus on agreement alone.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"more-on-this-subject"} -->
<h2 class="wp-block-heading" id="more-on-this-subject">More on interfaith dialogue</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The movement has older roots. The World’s Parliament of Religions, held in Chicago in 1893, was the first attempt to bring the great traditions together on one platform, and it is remembered as the beginning of organised interfaith encounter in the modern West. The Second Vatican Council gave the Catholic Church a formal footing in 1965, and the World Council of Churches opened its own programme of dialogue with people of other faiths soon afterwards.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Muslim initiatives followed later and on their own terms: the Amman Message of 2004, which set out who may speak for Islam, and A Common Word of 2007, in which Muslim scholars addressed Christian leaders on the love of God and of neighbour. Both documents drew on the Qur’an’s call to the People of the Book to come to a common word, and both have since been answered by Christian and Jewish leaders in turn. See <a href="/journal/amman-message-and-a-common-word/">The Amman Message and A Common Word</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>What distinguishes these efforts from the disputations of earlier centuries is their aim: to understand the other tradition as its own believers understand it, and to find common ground for justice and peace, while leaving each community free to hold and to state its own convictions.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/faith-and-reason/">Faith and reason in medieval Jewish, Christian and Muslim thought</a>, <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a> and <a href="/journal/jerusalem-in-three-traditions/">Jerusalem in three traditions</a>, <a href="/journal/amman-message-and-a-common-word/">The Amman Message and A Common Word</a>, <a href="https://www.acommonword.com/">A Common Word</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="canterbury" alt="Canterbury Cathedral, seat of the Archbishop of Canterbury, who welcomed A Common Word as a landmark in Muslim-Christian relations" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="wcc-geneva" alt="The headquarters of the World Council of Churches in Geneva" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

ABR_SEED,
		),
		array(
			'key' => 'post:millat-ibrahim', 'photo' => array( 'name' => 'hero-kaaba', 'alt' => 'Millat Ibrahim: pilgrims surrounding the Kaaba in the Great Mosque of Makkah' ), 'type' => 'post', 'slug' => 'millat-ibrahim', 'title' => 'The path of Abraham in the Qur’an',
			'excerpt' => 'How the Qur’an defines the millat Ibrahim, the path of Abraham, and what it asks of its hearers.', 'description' => 'Millat Ibrahim, the religion of Abraham in the Qur’an: why Islam calls itself his faith restored. Read the guide.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 120, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Qur'an repeatedly calls its hearers to follow the <em>millat Ibrāhīm</em> (<span lang="ar" dir="rtl">ملة إبراهيم</span>, the path, or way, of Abraham). The phrase is worth examining, because the Qur'an supplies its own definition wherever it appears.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-command-and-its-wording">The command and its wording</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-phrase-asks-of-the-hearer">What the phrase asks of the hearer</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-the-traditions-read-abraham">How the traditions read Abraham</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-command-and-its-wording"} -->
<h2 class="wp-block-heading" id="the-command-and-its-wording">The command and its wording</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Three passages carry the command directly. The first instructs the Prophet to follow the path of Abraham, "the true in faith", adding that he joined no partners with God.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The second answers those who invite others to become Jews or Christians by pointing to that same path.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The third repeats the instruction and describes Abraham as sound in faith and not among those who associate others with God.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>In each case the phrase is followed by the same qualification: Abraham was <em>ḥanīf</em> (<span lang="ar" dir="rtl">حنيف</span>, a pure monotheist), and he associated no partner with God. The <a href="/reference/sacred-texts/quran/">Qur'an</a> therefore defines the path it commands: worship directed to God alone, free of <em>shirk</em> (<span lang="ar" dir="rtl">شرك</span>, association).</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-phrase-asks-of-the-hearer"} -->
<h2 class="wp-block-heading" id="what-the-phrase-asks-of-the-hearer">What the phrase asks of the hearer</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Read in this way, the command is not a call to adopt an ancestral custom. It is a call to the monotheism that the Qur'an presents as older than the communities that trace themselves to Abraham, and as the standard by which their later divisions are judged. The same passages describe Abraham as neither Jew nor Christian, since the Torah and the Gospel came after him.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-the-traditions-read-abraham"} -->
<h2 class="wp-block-heading" id="how-the-traditions-read-abraham">How the traditions read Abraham</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jewish tradition remembers Abraham as the first to recognise the one God and as the father of a people bound by covenant. Christian tradition, following Paul, reads him as the exemplar of justifying faith. The Qur'an's emphasis falls elsewhere: on the content of his worship, and on the claim that this worship defines those who belong to him, whatever their descent.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Readers who wish to compare the three treatments side by side will find them in <a href="/journal/who-was-abraham/">Who was Abraham?</a> and in <a href="/reference/comparisons/">Comparative studies</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-mecca" alt="Pilgrims at the Station of Abraham in Makkah" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/abrahamic-monotheism/">How the Abrahamic religions understand monotheism</a> and <a href="/journal/who-was-kedar/">Kedar, the Arabs and the prophets</a>, <a href="/journal/the-stations-of-the-hajj/">The stations of the Hajj</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="jabal-al-nour" alt="Jabal al-Nour, near Makkah, the mountain holding the cave where Muhammad is said to have received the first revelation" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Millat Ibrahim</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/16/123">Qur'an 16:123</a>. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur'an 2:135. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur'an 3:95. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur'an 3:65-67. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur'an 3:68. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:who-was-kedar', 'photo' => array( 'name' => 'dumat-al-jandal', 'alt' => 'Who was Kedar? Marid Castle at Dumat al-Jandal, the northern Arabian oasis the Assyrians knew as Adummatu' ), 'type' => 'post', 'slug' => 'who-was-kedar', 'title' => 'Kedar, the Arabs and the prophets',
			'excerpt' => 'Kedar in the Hebrew Bible, the Arab tribes of the north, and the figure the oracles point to.', 'description' => 'Who was Kedar? Ishmael’s son, ancestor of the northern Arabs, and his place in the prophecies of Isaiah. Read more.', 'categories' => array( 'history', 'scripture' ), 'days_ago' => 65, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Who was Kedar? Kedar is a minor name in the Hebrew Bible with a long afterlife in commentary. He appears as the second son of Ishmael, and his descendants, the Kedarites, were an Arab people of the northern Arabian desert.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The interest of the name lies in what later readers made of it.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#kedar-in-the-biblical-text">Kedar in the biblical text</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-kedarites-in-history">The Kedarites in history</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-name-in-later-interpretation">The name in later interpretation</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-question-the-text-leaves-open">The question the text leaves open</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#why-the-name-still-matters">Why the name still matters</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-brief">Who was Kedar? In brief</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"kedar-in-the-biblical-text"} -->
<h2 class="wp-block-heading" id="kedar-in-the-biblical-text">Kedar in the biblical text</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The prophets mention Kedar in oracles concerning Arabia. One passage foretells that the glory of Kedar will fail within a year, and that few of the archers of its warriors will remain.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Another calls on the villages that Kedar inhabits to lift up their voice and sing to God.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> The Song of Songs uses the tents of Kedar as an image of dark beauty, and Jeremiah and Ezekiel name Kedar among the peoples trading in flocks with the settled kingdoms.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-kedarites-in-history"} -->
<h2 class="wp-block-heading" id="the-kedarites-in-history">The Kedarites in history</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Assyrian and Babylonian records from the eighth to the sixth centuries BCE name the Qidri as a confederation of the north Arabian desert, and later Persian-period inscriptions mention their kings. They lived by herding and by the caravan trade in incense and spices that linked southern Arabia to the Mediterranean. Their territory covered what is now northern Saudi Arabia and southern Jordan, and their descendants were absorbed into the Nabataean kingdom and later Arab confederations.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-name-in-later-interpretation"} -->
<h2 class="wp-block-heading" id="the-name-in-later-interpretation">The name in later interpretation</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Because Kedar came to stand for the Arabs generally, Jewish commentators used the term for the Arabic language, and a standard Hebrew lexicon records that the rabbis called all Arabs by this name and spoke of Arabic as the tongue of Kedar.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> In Islamic tradition, Qedar is remembered as a son of Ismāʿīl and an ancestor of the northern Arabs, from whom the genealogists trace the line of the Prophet Muhammad.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Muslim writers from the early centuries onwards read the oracles concerning Kedar, and the surrounding passages about a servant who brings light to the nations, as pointing towards Arabia. Jewish commentators read them historically, as concerning the Arab tribes of the seventh and sixth centuries BCE. Christian commentators have read the servant passages as fulfilled in Jesus.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-question-the-text-leaves-open"} -->
<h2 class="wp-block-heading" id="the-question-the-text-leaves-open">The question the text leaves open</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Set the pieces beside one another. The oracle addresses Kedar, and Kedar stands for the Arabs and for their language. The passage that follows calls on the villages of Kedar to sing a new song to God, and speaks of a servant who brings justice to the nations and light to those who sit in darkness.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> The Christian reading places that servant in Galilee, among a people who had the Torah and the prophets already, and it leaves the address to Kedar unaccounted for. Jesus did not preach to the Arabs, and he did not preach in Arabic.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>One figure in history answers the description. A man of the line of Kedar proclaimed to the Arabs, in the language of Kedar, the monotheism of the Israelite prophets before him, and within a lifetime the desert tribes the oracle names carried that message across the greater part of the known world. Muslims identify him as the Prophet Muhammad, and the reading set out here follows them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"why-the-name-still-matters"} -->
<h2 class="wp-block-heading" id="why-the-name-still-matters">Why the name still matters</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Kedar marks the point where the biblical record touches the Arab world directly. For historians it supplies evidence of Arabian tribes in contact with the empires of the ancient Near East. For readers within the traditions it raises the question of how the descendants of <a href="/reference/figures/#ishmael">Ishmael</a> stand within the promises made to Abraham, which is treated in <a href="/journal/who-was-abraham/">Who was Abraham?</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-brief"} -->
<h2 class="wp-block-heading" id="in-brief">Who was Kedar? In brief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Who was Kedar? The second son of Ishmael in Genesis, the ancestor of a powerful tribe of the Syrian and Arabian desert, and in the prophets a name for the Arabs as a whole. Isaiah foretells that the villages of Kedar will lift up their voice in praise, a passage Muslim scholars have long read as a sign of the Prophet who would come from Ishmael’s line.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur’an</a> and <a href="/journal/archaeology-and-scripture/">What archaeology tells us about the ancient Near East</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="petra-treasury" alt="The Treasury at Petra, carved by the Nabataeans, a people of northern Arabia" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="ashurbanipal-arabs" alt="An Assyrian relief showing Arab riders on camelback, from the North Palace of Nineveh" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://www.biblegateway.com/passage/?search=Genesis+25:13&amp;version=NRSVUE">Genesis 25:13</a>; 1 Chronicles 1:29. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Isaiah 21:16-17. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Isaiah 42:11. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Song of Songs 1:5; Jeremiah 49:28-29; Ezekiel 27:21. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">H. W. F. Gesenius, Hebrew and Chaldee Lexicon to the Old Testament, p. 724. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Isaiah 42:6-7, 10-12. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:john-the-baptist-in-four-traditions', 'photo' => array( 'name' => 'jordan-river', 'alt' => 'John the Baptist: the Jordan River at Qasr al-Yahud, the traditional site of the baptisms performed by John' ), 'type' => 'post', 'slug' => 'john-the-baptist', 'title' => 'John the Baptist in four traditions',
			'excerpt' => 'The prophet of the Jordan in the Gospels, in Jewish memory, in the Qur\'an and in Mandaean tradition.', 'description' => 'John the Baptist in the Gospels, Josephus, the Qur\'an and Mandaean tradition. Read how four faiths remember him.', 'categories' => array( 'religion', 'scripture' ), 'days_ago' => 4, 'since' => 26, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>John the Baptist is the one figure whom Mandaeism, Christianity and Islam all honour as a prophet of God, and whom Jewish memory preserves through the historian Josephus. Each tradition tells his story from a different vantage. For Christians he prepares the way for Jesus; for Muslims he is Yaḥyā (<span lang="ar" dir="rtl">يحيى</span>, John), a prophet given wisdom as a child; for Mandaeans he is Yahya Yuhana, the greatest and the last of the prophets, and the teacher whose baptism they still perform.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#in-the-gospels">In the Gospels</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-jewish-memory">In Jewish memory</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-the-quran">In the Qur'an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-mandaean-tradition">In Mandaean tradition</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#one-figure-four-readings">One figure, four readings</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="damascus-mosque" alt="The Umayyad Mosque in Damascus, which holds a shrine venerated as the burial place of the head of John the Baptist" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-the-gospels"} -->
<h2 class="wp-block-heading" id="in-the-gospels">In the Gospels</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Gospel of Luke opens with his birth: an angel announces to the priest Zechariah that his wife Elizabeth, long childless and advanced in years, will bear a son who is to be called John.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Mark presents the adult John in the wilderness, proclaiming a baptism of repentance for the forgiveness of sins and baptising crowds in the river Jordan, among them Jesus of Nazareth.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The Gospels close his life with his arrest and beheading at the order of Herod Antipas, the ruler of Galilee.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Christian tradition reads him as the forerunner, the voice that prepares the way for the Messiah.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-jewish-memory"} -->
<h2 class="wp-block-heading" id="in-jewish-memory">In Jewish memory</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>John does not appear in the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a>, which closes centuries before his birth, and rabbinic literature does not mention him. The fullest Jewish account comes from the historian Josephus, writing near the end of the first century. He describes John as a good man who urged the Jews to practise virtue and justice and to come together in baptism, and he records that Herod Antipas, fearing John's hold on the crowds, imprisoned him at the fortress of Machaerus, east of the Dead Sea, and put him to death there.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-the-quran"} -->
<h2 class="wp-block-heading" id="in-the-quran">In the Qur'an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The <a href="/reference/sacred-texts/quran/">Qur'an</a> tells of Zakariyyā (<span lang="ar" dir="rtl">زكريا</span>, Zechariah) praying in old age for an heir and receiving the promise of a son named Yaḥyā, of whom God says that He had made no <em>samiyy</em> (<span lang="ar" dir="rtl">سمي</span>) for him before.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The classical exegetes read the word two ways. Taken as a namesake, it means that no one before him had borne the name; taken as a peer, it means that no one before had been like him. Mujāhid and Saʿīd ibn Jubayr explained it as one like him, and Ibn ʿAbbās added that no barren woman had ever borne such a child. Al-Ṭabarī reported both readings and preferred the first.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>On either reading the name is distinct. Yaḥyā is formed from the Arabic root of life, while John renders the Hebrew Yoḥanan, which joins the divine name to a root meaning grace: two names from two different roots.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> The son is to confirm a word from God and to be honourable, chaste, and a prophet among the righteous.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> He is commanded to hold fast to the scripture and is given wisdom while still a child, together with tenderness, purity and devotion to his parents; peace is upon him on the day of his birth, the day of his death and the day he is raised alive.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Islamic tradition therefore counts Yaḥyā among the prophets and pairs him with his cousin ʿĪsā (<span lang="ar" dir="rtl">عيسى</span>, Jesus), whose own birth the Qur'an narrates in the verses that follow.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-mandaean-tradition"} -->
<h2 class="wp-block-heading" id="in-mandaean-tradition">In Mandaean tradition</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeans call him Yahya Yuhana, keeping both names side by side, and they value the first for its meaning, "he lives".<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup> A legend told among them recounts that he was born to the aged Zakharia and his wife ʿInoshwey, carried away as an infant by a being of light and nursed in a heavenly world, and consecrated a priest at twenty-one before being sent to <a href="/journal/jerusalem-in-three-traditions/">Jerusalem</a> as a prophet.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The community's own history scroll describes his ministry in its own terms. Yahya Yuhana, it says, took the <em>yardna</em> and the water of life, cleansed lepers, opened the eyes of the blind and made the maimed walk; he taught disciples and proclaimed the call of the Life for forty-two years before he was taken up.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> Mandaeans trace their religion to Adam and honour John as its greatest teacher, and every baptism in running water repeats the rite they hold he practised.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"one-figure-four-readings"} -->
<h2 class="wp-block-heading" id="one-figure-four-readings">One figure, four readings</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The four traditions agree on the outline: a prophet of the Jordan, born to an aged priest and his wife, who called his hearers to repentance and baptised them in running water, and who died at the hands of a ruler he had offended. They differ on what his life meant. The Gospels subordinate him to Jesus, the Qur'an honours him as a prophet in his own right, Josephus remembers a moral teacher, and the Mandaeans keep him as the last and greatest of the messengers. See also <a href="/journal/masbuta-baptism-in-running-water/">Masbuta: baptism in running water</a> and <a href="/religions/mandaeism/">Mandaeism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a> and <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a> and <a href="/journal/mary-across-the-traditions/">Mary across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="galilee" alt="The Sea of Galilee, where the Gospels place much of Jesus’ ministry" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on John the Baptist</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Luke 1:5-25, 57-66. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Mark 1:4-9. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Mark 6:17-29. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Josephus, Antiquities 18.116-119. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5"><a href="https://quran.com/19/2">Qur'an 19:2</a>-7. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">"And No One Had The Name Yaḥya (= John?) Before: A Linguistic &amp; Exegetical Enquiry Into Qur'an 19:7", Islamic Awareness, first composed 8 July 2000, last updated 18 August 2000, section 6, citing the commentaries of Ibn Kathīr and al-Suyūṭī on Qur'an 19:7; cf. Qur'an 19:65, the only other occurrence of <em>samiyy</em>. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibid., sections 2, 3 and 7. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Qur'an 3:39. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Qur'an 19:12-15. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), p. 281. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Ibid., pp. 261-262. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">E. S. Drower, ed. and tr., The Haran Gawaita and the Baptism of Hibil-Ziwa (Vatican City: Biblioteca Apostolica Vaticana, 1953), p. 7. <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:masbuta-baptism-in-running-water', 'photo' => array( 'name' => 'masbuta-karun', 'alt' => 'Mandaeans in white ritual dress at a baptism on the bank of the Karun River at Ahvaz' ), 'type' => 'post', 'slug' => 'masbuta-baptism-in-running-water', 'title' => 'Masbuta: baptism in running water',
			'excerpt' => 'How the Mandaeans baptise: the running water, the priest, the myrtle wreath and the sacraments on the bank.', 'description' => 'The Mandaean baptism step by step: running water, myrtle, signing and the sacred meal. Read how the rite unfolds.', 'categories' => array( 'culture' ), 'days_ago' => 2, 'since' => 26, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Baptism is the central act of Mandaean worship. Christians are baptised once; Mandaeans return to the water again and again, on Sundays and feast days, after childbirth and at marriage. The rite is called <em>maṣbuta</em> (baptism), and it needs running water.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-water">The water</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#before-the-rite">Before the rite</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-the-water">In the water</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#on-the-bank">On the bank</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#baptism-among-the-traditions">Baptism among the traditions</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="myrtle" alt="Sprigs of myrtle, twisted into the wreaths worn during Mandaean baptism" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-water"} -->
<h2 class="wp-block-heading" id="the-water">The water</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeans call the water of baptism <em>yardna</em>, Jordan, and the earthly stream stands for a heavenly one. Most scholars take the word from the river itself, although E. S. Drower doubted the connection. Each person enters the water and is baptised individually; there is no collective rite.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Still water will not serve. The rite is held at the pool of a <em>mandi</em>, the sacred enclosure, or in the river itself: the first baptism Drower witnessed, of a woman after childbirth, took place in the river at Amarah on a Sunday.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"before-the-rite"} -->
<h2 class="wp-block-heading" id="before-the-rite">Before the rite</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The priest prepares himself first. Standing barefoot in his white ritual dress, the <em>rasta</em>, he faces the North Star and recites the <em>rahmi</em>, the prayers of the day.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> He twists fresh myrtle into two small wreaths, one for his own head and one for his staff; each candidate receives a wreath of the same kind and carries it on the little finger of the right hand until after the immersion.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-the-water"} -->
<h2 class="wp-block-heading" id="in-the-water">In the water</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The candidate goes down into the <em>yardna</em> and submerges three times, and in the fuller form of the rite the priest, standing before the candidate, dips him under three times more. Immediately afterwards the priest signs the forehead three times, drawing his finger from the right ear to the left, and pronounces the baptismal formula over the person by name: "thou art signed with the sign of Life".<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The candidate drinks from the water three times, and priest and candidate clasp hands in the <em>kushta</em>, the ritual handclasp. The priest then places the myrtle wreath beneath the candidate's headdress, the leaves falling over the left temple.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"on-the-bank"} -->
<h2 class="wp-block-heading" id="on-the-bank">On the bank</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The baptised wait on the bank, facing north. When a small group has been immersed, the priest comes out of the water and signs each forehead three times with a paste of sesame. Each person washes the bared right arm in the pool, and the priest gives each a fragment of the sacramental bread, the <em>pihtha</em>.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"baptism-among-the-traditions"} -->
<h2 class="wp-block-heading" id="baptism-among-the-traditions">Baptism among the traditions</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Immersion in water runs through all four traditions. Jewish law requires immersion in a <em>mikveh</em>, a ritual pool, for purity and for conversion. Christian baptism, received once, marks entry into the Church. <a href="/religions/islam/">Islam</a> prescribes <em>wuḍūʾ</em> (<span lang="ar" dir="rtl">وضوء</span>, ablution) before prayer and <em>ghusl</em> (<span lang="ar" dir="rtl">غسل</span>, full washing) after major impurity. Mandaeism alone makes a repeated baptism in running water, performed by a priest, the heart of its worship. See <a href="/journal/john-the-baptist/">John the Baptist in four traditions</a> and <a href="/religions/mandaeism/">Mandaeism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/prayer-in-abrahamic-traditions/">Prayer across the Abrahamic traditions</a> and <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a>, <a href="https://www.britannica.com/topic/Mandaeanism">Mandaeanism (Encyclopaedia Britannica)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="karun-aerial" alt="An aerial view of the Karun River near Ahvaz, Iran, where Mandaean baptisms are performed" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Eric Segelberg, Maṣbūtā: Studies in the Ritual of the Mandaean Baptism (Uppsala: Almqvist &amp; Wiksells, 1958), p. 38. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), p. 109. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ibid., p. 110. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ibid., pp. 35-36. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Eric Segelberg, Maṣbūtā: Studies in the Ritual of the Mandaean Baptism (Uppsala: Almqvist &amp; Wiksells, 1958), p. 53. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), p. 36. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibid., pp. 115-116. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-sabians-of-the-quran', 'photo' => array( 'name' => 'mandaeism', 'alt' => 'The Sabians: a Mandaean immersing in the Karun River at Ahvaz during masbuta' ), 'type' => 'post', 'slug' => 'the-sabians-of-the-quran', 'title' => 'The Sabians of the Qur’an',
			'excerpt' => 'The community the Qur’an names beside the Jews and the Christians, and how Muslim scholars answered the question of who they were.', 'description' => 'Who were the Sabians the Qur\'an names beside Jews and Christians? Read what exegetes, jurists and al-Biruni concluded.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 1, 'since' => 28, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Three times the Qur'an names a community called the <em>Ṣābiʾūn</em> (<span lang="ar" dir="rtl">الصابئون</span>, the Sabians), each time beside the Jews and the Christians.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> It never says who they were. Muslim scholars have asked the question since the first centuries of Islam, and the answers they gave show how the Qur'an's recognition of other communities was read, extended and applied.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-three-verses">The three verses</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-exegetes-said">What the exegetes said</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-jurists">The jurists</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#two-claimants">Two claimants to the name</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-question-shows">What the question shows</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="harran-ruins" alt="Ruins at Harran in southern Turkey, home to a community that took the name Sabian under Muslim rule" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-three-verses"} -->
<h2 class="wp-block-heading" id="the-three-verses">The three verses</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Two of the verses promise that those who believe, the Jews, the Christians and the Sabians, whoever of them believes in God and the Last Day and does good, will have their reward with their Lord and will neither fear nor grieve. The third lists the Sabians with the Jews, the Christians, the Magians and the polytheists, and declares that God will judge between them on the Day of Resurrection.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> In the first two the Sabians stand between the Jews and the Christians, a placing that suggests kinship with the People of the Book; the third sets them in a wider company.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-exegetes-said"} -->
<h2 class="wp-block-heading" id="what-the-exegetes-said">What the exegetes said</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The word itself was understood to mean those who turn from one religion to another.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Al-Ṭabarī (d. 923) gathered the reports that had reached him: the Sabians were a sect of the Christians, or a people between <a href="/religions/judaism/">Judaism</a> and <a href="/religions/christianity/">Christianity</a>, or worshippers of angels.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> A report from Ibn ʿAbbās places them between the Jews and the Christians, without a scripture of their own.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Fakhr al-Dīn al-Rāzī (d. 1209) set out the range of views and concluded that none could be chosen decisively, while Ibn Kathīr (d. 1373) counted them a faction of the People of the Book who read the Psalms.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The exegetes recorded the evidence, weighed it, and left the question open where the text itself left it open.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-jurists"} -->
<h2 class="wp-block-heading" id="the-jurists">The jurists</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The question mattered in law, because the People of the Book held a protected status. Abū Ḥanīfa is reported to have counted the Sabians among them; Shāfiʿī and Ḥanbalī jurists were more cautious and asked for evidence of a scripture.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> Al-Shahrastānī found a middle term and called them the people of a doubtful book, holders of sacred scrolls whose status was uncertain.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup> In practice Muslim rulers extended protection to the communities that claimed the name.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"two-claimants"} -->
<h2 class="wp-block-heading" id="two-claimants">Two claimants to the name</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Two communities took the name under Muslim rule. Reports tell that when the caliph al-Maʾmūn (r. 813 to 833) passed through Harran, in upper Mesopotamia, its people declared themselves Sabians, and they kept their ancient astral worship under that title.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> Al-Bīrūnī, among the earliest Muslim scholars of comparative religion, refused them the name. The Harranians, he wrote, were idolaters who had adopted it to gain protected status; the true Sabians were monotheists, the descendants of Jews who had remained in Babylonia, who revered light, prayed facing the north, and treated the bodies of the dead as a source of pollution.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Those marks are recognisable in the Mandaeans of southern Iraq, a monotheist community whose faith centres on the World of Light and whose priests pray facing the North Star.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> Their own history scroll records how their leader, Anush son of Danqa, came before the Arab ruler and explained their faith, and how the Muslims were forbidden to harm them.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup>The Mandaeans survived, and they are now often regarded as the last living Sabians.<sup class="abr-fn"><a href="#note-16" id="ref-16">16</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-question-shows"} -->
<h2 class="wp-block-heading" id="what-the-question-shows">What the question shows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Modern scholars read the history of the name as a sign of flexibility: the Sabian category allowed Muslim law and theology to bring minority communities within the framework of the People of the Book.<sup class="abr-fn"><a href="#note-17" id="ref-17">17</a></sup> The <a href="/reference/sacred-texts/quran/">Qur'an</a> named a community it did not define, and Muslim scholarship answered with a recognition broad enough to protect those who sought it. A small baptist people from the marshes of Mesopotamia owes much of its survival across fourteen centuries to that recognition. See <a href="/religions/mandaeism/">Mandaeism</a> and <a href="/journal/masbuta-baptism-in-running-water/">Masbuta: baptism in running water</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/john-the-baptist/">John the Baptist in four traditions</a> and <a href="/journal/interfaith-dialogue/">Interfaith dialogue in the modern era</a>, <a href="/journal/transmission-of-scripture/">The preservation and transmission of scripture</a> and <a href="/journal/amman-message-and-a-common-word/">The Amman Message and A Common Word</a>, <a href="/journal/sabians-in-classical-muslim-texts/">The Sabians in classical Muslim scholarship</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="al-biruni-manuscript" alt="A diagram of lunar phases from a manuscript of al-Biruni’s Kitab al-Tafhim" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the Sabians</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/2/62">Qur'an 2:62</a>; 5:69; 22:17. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Noor Mohammad Osmani and Abul Kalam Md Motiur Rahman, "The Sabians (al-Ṣābiʾūn): Origins, History, and Religious Identity", e-ISSN 2600-8394, vol. 9, no. 2 (December 2025), p. 3. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur'an 2:62; 5:69; 22:17. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Osmani and Rahman, op. cit., p. 5. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Muhammad Azizan Sabjan, "The Al-Ṣābiʾūn (The Sabians): An Overview from the Quranic Commentators, Theologians and Jurists", World Journal of Islamic History and Civilization 1, no. 3 (2011), p. 163. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Osmani and Rahman, op. cit., p. 5. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibid., p. 8. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Ibid., p. 7. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Ibid., p. 8. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Sabjan, op. cit., p. 165. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Osmani and Rahman, op. cit., p. 8. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">Ibid., p. 9. <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Sabjan, op. cit., p. 165. <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), p. 110. <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-15">E. S. Drower, ed. and tr., The Haran Gawaita and the Baptism of Hibil-Ziwa (Vatican City: Biblioteca Apostolica Vaticana, 1953), pp. 15-16. <a href="#ref-15" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-16">Osmani and Rahman, op. cit., p. 2. <a href="#ref-16" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-17">Ibid., p. 1. <a href="#ref-17" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-king-and-the-pharaoh', 'photo' => array( 'name' => 'karnak', 'alt' => 'The king and the Pharaoh: columns of the Great Hypostyle Hall at Karnak, raised under the New Kingdom' ), 'type' => 'post', 'slug' => 'the-king-and-the-pharaoh', 'title' => 'The king and the Pharaoh',
			'excerpt' => 'Joseph served a king and Moses faced a Pharaoh: how the Qur’an’s two titles for the ruler of Egypt match the Egyptian record.', 'description' => 'The king and the Pharaoh: why the Qur’an calls Joseph’s ruler a king and Moses’s a pharaoh. Read the answer.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 0, 'since' => 30, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The king and the Pharaoh are two different titles, and the Qur’an keeps them apart. The Bible and the Qur'an both tell how Joseph rose to power in Egypt and how Moses confronted its ruler generations later. The two scriptures differ in a detail that looks small and turns out to be telling: what they call the king.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#two-titles-in-the-quran">Two titles in the Qur'an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-egyptian-record-shows">What the Egyptian record shows</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#dating-joseph-and-moses">Dating Joseph and Moses</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-to-read-the-difference">How to read the difference</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="ramesses-statue" alt="A statue of Ramesses II, a New Kingdom pharaoh, the era in which the Egyptian title came to name the king himself" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"two-titles-in-the-quran"} -->
<h2 class="wp-block-heading" id="two-titles-in-the-quran">Two titles in the Qur'an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In the story of Joseph, the <a href="/reference/sacred-texts/quran/">Qur'an</a> calls the ruler of Egypt <em>al-malik</em> (<span lang="ar" dir="rtl">الملك</span>, the king). It is the king who dreams of seven fat cows devoured by seven lean ones, the king who summons Joseph from prison, and the king's cup that is found in his brother's saddlebag.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> In the story of Moses, the ruler is <em>Firʿawn</em> (<span lang="ar" dir="rtl">فرعون</span>, Pharaoh), the name the Qur'an uses for him throughout.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Across the whole Qur'an the two titles never cross: Joseph's king is never called Pharaoh.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a> uses a single title for both. The ruler who takes Sarah into his house in the time of Abraham, the ruler whose dreams Joseph interprets, and the ruler who resists Moses are all Pharaoh.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-egyptian-record-shows"} -->
<h2 class="wp-block-heading" id="what-the-egyptian-record-shows">What the Egyptian record shows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The word Pharaoh comes through Greek from the Egyptian <em>per-aa</em>, "the great house". In the Old and Middle Kingdoms it named the royal palace. Only in the New Kingdom, which began around 1550 BCE, did it come to name the king himself.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The earliest examples come from the Eighteenth Dynasty: an ostracon from the joint reign of Hatshepsut and Thutmose III refers to the king simply as Pharaoh, and Alan Gardiner cited a clear instance under Amenhotep IV.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> The Egyptologist Toby Wilkinson draws the consequence plainly: to call a ruler before the New Kingdom Pharaoh is strictly anachronistic.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"dating-joseph-and-moses"} -->
<h2 class="wp-block-heading" id="dating-joseph-and-moses">Dating Joseph and Moses</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Scholars who look for Joseph in Egyptian history place him before the New Kingdom, either in the Middle Kingdom or in the Hyksos period, when rulers of Asiatic origin held northern Egypt.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Most place Moses within the New Kingdom, often in the thirteenth century BCE.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> On those datings the Qur'an's usage fits the history exactly. Joseph served a king at a time when no Egyptian called his ruler Pharaoh; Moses faced a Pharaoh at a time when the title had come into use.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-to-read-the-difference"} -->
<h2 class="wp-block-heading" id="how-to-read-the-difference">How to read the difference</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Some writers have argued that Pharaoh was a permanent designation of the Egyptian king, so that the biblical usage is correct for every period. The Egyptian evidence does not support that view.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup> Biblical scholars have read the usage as a sign of when the Genesis narratives were written down: the writers described the Egypt of the patriarchs in the vocabulary of their own later age.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Qur'an was proclaimed in seventh-century Arabia, many centuries after the events it narrates, when no one could any longer read the Egyptian inscriptions. It nonetheless keeps the older title for Joseph's ruler and the later one for Moses's. For Muslim readers the distinction is one more sign that the Qur'an does not depend on the earlier scriptures for its knowledge of the past. See <a href="/reference/figures/#joseph">Joseph</a> and <a href="/reference/figures/#moses">Moses</a> among the figures.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/archaeology-and-scripture/">What archaeology tells us about the ancient Near East</a> and <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/haman-in-the-quran/">Haman in the Qur’an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="scarab" alt="The carved base of a Middle Kingdom Egyptian scarab amulet" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the king and the Pharaoh</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/12/43">Qur'an 12:43</a>, 12:50, 12:54, 12:72, 12:76. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur'an 7:104; 10:75; 20:24. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">"Qur'anic Accuracy Vs. Biblical Error: The Kings &amp; Pharaohs Of Egypt", Islamic Awareness, first composed 11 January 1999, last updated 3 March 2006, section 3. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Genesis 12:15; 41:1; Exodus 5:1. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">I. Shaw and P. Nicholson, British Museum Dictionary of Ancient Egypt (London: British Museum Press, 1995), p. 222; cf. T. Wilkinson, The Thames &amp; Hudson Dictionary of Ancient Egypt (London: Thames &amp; Hudson, 2005), p. 186. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Hayes's ostracon and A. Gardiner, Egyptian Grammar, 3rd edn (London: Oxford University Press, 1957), p. 75, both as cited in "Qur'anic Accuracy Vs. Biblical Error: The Kings &amp; Pharaohs Of Egypt", Islamic Awareness, first composed 11 January 1999, last updated 3 March 2006, section 5. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Wilkinson, op. cit., p. 186. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">"Joseph, Moses &amp; The Rulers Of Egypt", Islamic Awareness, last updated 11 April 1999, section 4. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">"Qur'anic Accuracy Vs. Biblical Error: The Kings &amp; Pharaohs Of Egypt", Islamic Awareness, first composed 11 January 1999, last updated 3 March 2006, section 4. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Ibid., section 5, on A. S. Yahuda and J. Vergote. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Ibid., section 6. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:jesus-across-the-traditions', 'photo' => array( 'name' => 'holy-sepulchre', 'alt' => 'Jesus: the Church of the Holy Sepulchre in Jerusalem, the traditional site of the crucifixion and resurrection' ), 'type' => 'post', 'slug' => 'jesus-across-the-traditions', 'title' => 'Jesus across the traditions',
			'excerpt' => 'Lord and Saviour, prophet and Messiah, or a pupil of John who departed from his teaching: how three traditions see Jesus.', 'description' => 'How Christianity, Judaism, Islam and Mandaeism each understand Jesus. Read the comparison across four traditions.', 'categories' => array( 'religion', 'theology' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Jesus is honoured across three of the four Abrahamic traditions, though each gives him a different place. For Christians he is Lord and Saviour; for Muslims he is ʿĪsā (<span lang="ar" dir="rtl">عيسى</span>), a prophet and the Messiah, born of a virgin but not divine; Jewish tradition does not accept him as the Messiah it awaits. Mandaean texts remember him as a pupil of John who altered what John had taught.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#in-the-gospels">In the Gospels</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-jewish-tradition">In Jewish tradition</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-the-quran">In the Qur'an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-mandaean-tradition">In Mandaean tradition</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#one-figure-three-verdicts">One figure, three verdicts</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"in-the-gospels"} -->
<h2 class="wp-block-heading" id="in-the-gospels">In the Gospels</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Matthew and Luke open with his birth to Mary, a virgin betrothed to Joseph, in Bethlehem.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The Gospels present him teaching, healing and gathering disciples in Galilee and Judea, and record his trial before Pontius Pilate and his crucifixion outside Jerusalem, followed by his resurrection on the third day.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Christian doctrine, formulated at the councils of Nicaea and Chalcedon, holds him to be the second person of the Trinity, fully God and fully man.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-jewish-tradition"} -->
<h2 class="wp-block-heading" id="in-jewish-tradition">In Jewish tradition</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism does not recognise Jesus as the Messiah, whose coming it holds is still awaited, and rejects the claim of his divinity as incompatible with the strict monotheism of the Shema. Jewish scholarship generally situates him as a first-century Jewish teacher whose followers, after his death, became a movement distinct from the Judaism of his day.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-the-quran"} -->
<h2 class="wp-block-heading" id="in-the-quran">In the Qur'an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur'an devotes a chapter to his mother and tells of his birth to Maryam, a virgin, by the command of God, without a father.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> It calls him <em>al-Masīḥ</em> (<span lang="ar" dir="rtl">المسيح</span>, the Messiah) and <em>Kalimat Allāh</em> (<span lang="ar" dir="rtl">كلمة الله</span>, a word from God), a prophet who spoke from the cradle and worked miracles by God's permission.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>It denies that God has a son, denies the crucifixion, and states that God raised him to Himself: "they did not kill him, nor did they crucify him, but it was made to appear so to them."<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Classical exegetes disagree on the exact mechanism of the substitution and on whether Jesus died a natural death after being raised, but they agree that his execution as reported by the Gospels did not take place as described.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-mandaean-tradition"} -->
<h2 class="wp-block-heading" id="in-mandaean-tradition">In Mandaean tradition</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaean texts place Jesus among the pupils of Yahya Yuhana (John the Baptist) and hold that he departed from what John had taught him.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Mandaeans do not accept him as a prophet in their own line, which runs from Adam to John.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"one-figure-three-verdicts"} -->
<h2 class="wp-block-heading" id="one-figure-three-verdicts">One figure, three verdicts</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The three traditions that discuss him agree on almost nothing beyond his existence and his mother's name: Christianity makes him God incarnate, Judaism a teacher without messianic standing, and Islam a prophet whose life the Gospels are held to have misreported at its most consequential point. See <a href="/reference/figures/#jesus">Jesus</a> among the figures and <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur'an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/john-the-baptist/">John the Baptist in four traditions</a>, <a href="/journal/mary-across-the-traditions/">Mary across the traditions</a> and <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/the-council-of-nicaea/">Nicaea, 325: the council, the creed and the church beneath the lake</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="manger-square" alt="Manger Square in Bethlehem, by tradition the site of the Nativity" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="beatitudes" alt="The Sea of Galilee seen from the Mount of Beatitudes, where the Gospels place much of Jesus’ teaching" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Jesus</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Matthew 1:18-25; Luke 1:26-38; 2:1-7. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Mark 1:14-15; 14-15; 16:1-8. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">The Nicene Creed (325, 381 CE); the Chalcedonian Definition (451 CE). <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><a href="https://quran.com/19/16">Qur'an 19:16</a>-22. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur'an 3:45; 4:171; 3:49. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Qur'an 4:157. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibn Kathīr and al-Ṭabarī on Qur'an 4:157, both reporting that a substitute was crucified in his place; cf. Q19:33, which some exegetes read as referring to a future death after his return. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), pp. 261-262. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:mary-across-the-traditions', 'photo' => array( 'name' => 'nativity', 'alt' => 'Mary: the Church of the Nativity in Bethlehem, the traditional site of the birth of Jesus' ), 'type' => 'post', 'slug' => 'mary-across-the-traditions', 'title' => 'Mary across the traditions',
			'excerpt' => 'The only woman named in the Qur\'an and the mother of God incarnate in Christian doctrine: Mary in scripture.', 'description' => 'Mary in the New Testament and the Qur\'an: the virgin birth, her honour, and where the two accounts diverge.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Mary is the one figure honoured by name in both the New Testament and the Qur'an, and the only woman the Qur'an names.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Christians venerate her as the mother of God incarnate; Muslims honour her as the mother of a prophet and, by the Qur'an's own words, exalted above the women of the worlds.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#in-the-new-testament">In the New Testament</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-the-quran">In the Qur'an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-shared-manuscript-witness">A shared manuscript witness</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#common-ground-and-disagreement">Common ground and disagreement</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="ephesus-mary-house" alt="The House of the Virgin Mary near Ephesus, a site venerated by Christian and Muslim visitors alike" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-the-new-testament"} -->
<h2 class="wp-block-heading" id="in-the-new-testament">In the New Testament</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Luke's Gospel tells of the angel Gabriel announcing to Mary, a virgin betrothed to Joseph, that she will conceive by the Holy Spirit and bear a son to be called Jesus.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> She travels to Bethlehem for the birth, and the Gospels place her at the foot of the cross and among the earliest witnesses named after the resurrection.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Christian doctrine over the centuries has added to her honour: the Council of Ephesus in 431 CE declared her <em>Theotokos</em>, God-bearer, and Catholic and Orthodox tradition holds her own conception and bodily assumption to have been free of the ordinary course of things.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-the-quran"} -->
<h2 class="wp-block-heading" id="in-the-quran">In the Qur'an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The nineteenth chapter of the Qur'an bears her name, <em>Sūrat Maryam</em>, the only chapter named for a woman.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> It tells of her withdrawal to a private place, the angel's announcement of a pure son, and her giving birth alone beneath a palm tree, comforted by a stream and ripening dates.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> A separate verse has angels tell her that God has chosen her and purified her above the women of the worlds.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> The Qur'an affirms the virgin birth as an act of divine power, comparing it to the creation of Adam, while denying that it makes Jesus the son of God.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-shared-manuscript-witness"} -->
<h2 class="wp-block-heading" id="a-shared-manuscript-witness">A shared manuscript witness</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Two of the oldest known Qur'an manuscripts both preserve part of her chapter: the Birmingham leaves carry its closing verses, and the Sana'a palimpsest's lower text includes an early version of its opening.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> See <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur'an in historical context</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"common-ground-and-disagreement"} -->
<h2 class="wp-block-heading" id="common-ground-and-disagreement">Common ground and disagreement</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Both scriptures agree that Mary conceived as a virgin, by divine action, without a human father, and both hold her in the highest honour given to a woman in their respective traditions. They part over what that birth implies: for the New Testament it is a sign of the incarnation of God the Son, for the Qur'an a miracle comparable to the creation of Adam and no more, safeguarding the strict oneness of God. See <a href="/reference/figures/#mary">Mary</a> among the figures and <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/john-the-baptist/">John the Baptist in four traditions</a> and <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur’an in historical context</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="basilica-annunciation" alt="Inside the dome of the Basilica of the Annunciation in Nazareth, built over the traditional site of the Annunciation" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Mary</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Encyclopaedic surveys of the Qur'an's named figures count Maryam as the only woman named in the text; she is mentioned by name thirty-four times. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Luke 1:26-38. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">John 19:25; Acts 1:14. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Council of Ephesus (431 CE); Catholic dogmas of the Immaculate Conception (1854) and the Assumption (1950). <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur'an, sūrah 19, Maryam. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6"><a href="https://quran.com/19/16">Qur'an 19:16</a>-26. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Qur'an 3:42. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Qur'an 3:47, 59. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">University of Birmingham, Cadbury Research Library, Islamic Arabic 1572a (Q19:91-98); the Sana'a palimpsest's lower text (Q19:2-28). <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-preservation-and-transmission-of-scripture', 'photo' => array( 'name' => 'isaiah-scroll', 'alt' => 'The transmission of scripture: hebrew columns of the Great Isaiah Scroll from Qumran, copied in the second century BCE' ), 'type' => 'post', 'slug' => 'transmission-of-scripture', 'title' => 'The preservation and transmission of scripture',
			'excerpt' => 'How the Hebrew Bible, the New Testament and the Qur\'an were each copied, checked and handed down across centuries.', 'description' => 'Manuscripts, oral transmission and textual criticism: how three scriptures were preserved. Compare the evidence.', 'categories' => array( 'scripture' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>How a scripture reaches the present matters as much as what it says. Judaism, Christianity and Islam each developed a distinct answer to the problem of transmission across centuries and, in the case of the Qur'an, across a period when writing itself was far from universal.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-hebrew-bible">The Hebrew Bible</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-new-testament">The New Testament</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-quran">The Qur'an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#oral-transmission">Oral transmission</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-comparison-shows">What the comparison shows</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="qumran-caves" alt="The caves near Qumran on the Dead Sea, where the scrolls were found" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-hebrew-bible"} -->
<h2 class="wp-block-heading" id="the-hebrew-bible">The Hebrew Bible</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Dead Sea Scrolls, found near Qumran from 1947 onwards, include copies of nearly every book of the Hebrew Bible from the third century BCE to the first century CE. Compared with the medieval Masoretic Text codified centuries later, they show substantial agreement in most books alongside real variation in others, evidence of a text that stabilised gradually, over centuries.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-new-testament"} -->
<h2 class="wp-block-heading" id="the-new-testament">The New Testament</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The New Testament survives in thousands of Greek manuscripts, far more than any other ancient text, but no two of the earliest ones agree in every particular; textual critics work by comparing this manuscript tradition to reconstruct the earliest recoverable readings, a discipline as old as the printed Greek New Testament itself.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-quran"} -->
<h2 class="wp-block-heading" id="the-quran">The Qur'an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Islamic tradition holds that the Qur'an was both memorised and written down during Muhammad's lifetime, and that the caliph ʿUthmān, within about twenty years of his death, had a single standard written text prepared and copies sent to the garrison cities, with other versions destroyed.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Two early manuscripts bear on the claim. The Birmingham leaves, radiocarbon-dated to within the range of Muhammad's own lifetime, match the standard text closely.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The Sana'a palimpsest is more complicated: its later, upper layer also matches the standard text, but an earlier, erased lower layer, recovered by ultraviolet imaging, differs from it in wording and in the order of its chapters, and its script predates the reforms that later fixed the reading of the Arabic consonants.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Specialists read the lower text as a variant version in circulation before ʿUthmān's standardisation consistent with the tradition's account of a later, deliberate unification of the text.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"oral-transmission"} -->
<h2 class="wp-block-heading" id="oral-transmission">Oral transmission</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Alongside the manuscripts, Islamic scholarship places heavy weight on the chain of memorisation: reciters (<em>ḥuffāẓ</em>) who learned the whole text by heart from a teacher who had done the same, a chain (<em>isnād</em>) tradition also central to the transmission of hadith. A text is called <em>mutawātir</em>, or continuously attested, when so many independent chains converge on the same reading that collusion in error is considered practically impossible.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Judaism developed a comparable safeguard for its own scripture in the Masoretes' exact counting of letters and words to guard against a copyist's slip.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-comparison-shows"} -->
<h2 class="wp-block-heading" id="what-the-comparison-shows">What the comparison shows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Each tradition met the problem of transmission with the tools available to it: Judaism through Masoretic precision, Christianity through the sheer number of surviving copies subjected to critical comparison, and Islam through a written text stabilised early and reinforced by memorisation. None of the three claims an autograph, the author's own original copy, has survived; each offers a documented case for how confidently its later text can be traced back toward its origin. See <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur'an in historical context</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a> and <a href="/journal/the-cairo-genizah/">The Cairo Genizah</a>, <a href="https://www.birmingham.ac.uk/news/2015/birmingham-quran-manuscript-dated-among-the-oldest-in-the-world">The Birmingham Qur’an manuscript (University of Birmingham)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="aleppo-genesis" alt="A page of Genesis from the Aleppo Codex, one of the manuscripts behind the Masoretic Hebrew text" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Emanuel Tov, Textual Criticism of the Hebrew Bible, 3rd rev. ed. (Minneapolis: Fortress Press, 2012), on the Qumran biblical scrolls and the proto-Masoretic tradition. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Bruce M. Metzger and Bart D. Ehrman, The Text of the New Testament: Its Transmission, Corruption, and Restoration, 4th ed. (Oxford: Oxford University Press, 2005). <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ṣaḥīḥ al-Bukhārī, Book of the Merits of the Qur'an, on Zayd ibn Thābit's compilation under Abū Bakr and ʿUthmān's standardisation and dispatch of copies. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">University of Birmingham, "Birmingham Qur'an manuscript dated among the oldest in the world," press release, 22 July 2015. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Behnam Sadeghi and Uwe Bergmann, "The Codex of a Companion of the Prophet and the Qur'ān of the Prophet," Arabica 57 (2010): 343-436; Asma Hilali, The Sana'a Palimpsest: The Transmission of the Qur'an in the First Centuries AH (Oxford: Oxford University Press, 2017). <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Nicolai Sinai, "Beyond the Cairo Edition: On the Study of Early Quranic Codices," Journal of the American Oriental Society 140, no. 1 (2020): 189-192, reviewing Hilali's edition and the codex's relation to the standard text. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibn al-Jazarī, al-Nashr fī al-Qirāʾāt al-ʿAshr, on the conditions for a mutawātir reading. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Tov, Textual Criticism of the Hebrew Bible, on the Masoretic apparatus and its scribal safeguards. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:al-ghazali-ibn-rushd-and-the-limits-of-reason', 'photo' => array( 'name' => 'aristotle-arabic', 'alt' => 'Ibn Rushd and al-Ghazali: a page from a medieval Arabic manuscript of Aristotle\'s logical works' ), 'type' => 'post', 'slug' => 'ibn-rushd-and-al-ghazali', 'title' => 'Al-Ghazali, Ibn Rushd and the limits of reason',
			'excerpt' => 'The medieval argument over whether philosophy could be trusted, and why it mattered more in Europe than in Islam.', 'description' => 'Al-Ghazali\'s attack on the philosophers and Ibn Rushd\'s reply, and why the debate shaped Europe more than Islam.', 'categories' => array( 'philosophy' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Faith and reason in medieval thought touches al-Ghazali and Ibn Rushd in passing; their dispute deserves its own telling, since it set the terms for how Islamic and, later, Christian scholasticism would argue about the proper limits of philosophy. The exchange spanned almost a century, from al-Ghazālī’s attack on the philosophers in the 1090s to Ibn Rushd’s reply around 1180.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#al-ghazali-against-the-philosophers">Al-Ghazali against the philosophers</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#ibn-rushds-reply">Ibn Rushd's reply</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#who-prevailed-where">Who prevailed where</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="averroes-statue" alt="A memorial statue of Ibn Rushd (Averroes) in Córdoba" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"al-ghazali-against-the-philosophers"} -->
<h2 class="wp-block-heading" id="al-ghazali-against-the-philosophers">Al-Ghazali against the philosophers</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abū Ḥāmid al-Ghazālī (d. 1111), a jurist and theologian trained in the Ashʿarī school, wrote The Incoherence of the Philosophers to show that the Aristotelian metaphysics of Ibn Sīnā (Avicenna) and al-Fārābī could not deliver the certainty its practitioners claimed.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>He first set out their positions fairly, in a companion work, before attacking them on twenty points, three of which he judged to amount to unbelief: the philosophers' denial of bodily resurrection, their claim that God knows only universals and not particulars, and their doctrine of the world's eternity.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> His argument rested on occasionalism, the view that no created cause necessarily produces its effect; fire burns cotton only because God customarily wills it so, and God could will otherwise.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ibn-rushds-reply"} -->
<h2 class="wp-block-heading" id="ibn-rushds-reply">Ibn Rushd's reply</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ibn Rushd (Averroes, d. 1198), a judge and physician of Córdoba and the most influential commentator on Aristotle in either the Islamic or the Latin world, replied decades later with The Incoherence of the Incoherence, defending the philosophers point by point and arguing that al-Ghazālī had misunderstood or misrepresented their positions.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> In a separate work, The Decisive Treatise, he argued that philosophy and revealed law could not truly conflict, since both were paths to the same truth, and that apparent conflicts called for allegorical interpretation of scripture, with demonstrative reasoning left intact.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"who-prevailed-where"} -->
<h2 class="wp-block-heading" id="who-prevailed-where">Who prevailed where</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In the Islamic world al-Ghazālī's side of the argument proved the more lasting: Ashʿarī theology and Sufi devotion remained dominant, and the school of philosophy Ibn Rushd defended found few successors after him among Muslim scholars.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> His influence travelled to Latin Europe, where his commentaries on Aristotle, translated into Latin, earned him the title "the Commentator" and shaped scholastic philosophy for centuries, Thomas Aquinas among those who engaged closely with his work.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> See <a href="/journal/faith-and-reason/">Faith and reason in medieval Jewish, Christian and Muslim thought</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/faith-and-reason/">Faith and reason in medieval Jewish, Christian and Muslim thought</a> and <a href="/journal/abrahamic-monotheism/">How the Abrahamic religions understand monotheism</a>, <a href="https://plato.stanford.edu/entries/ibn-rushd/">Ibn Rushd (Stanford Encyclopedia of Philosophy)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="averroes-latin" alt="A medieval Latin manuscript of a commentary on Aristotle, of the kind through which Ibn Rushd’s work reached Europe" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Al-Ghazālī, Tahāfut al-Falāsifa (The Incoherence of the Philosophers), trans. Michael E. Marmura, 2nd ed. (Provo: Brigham Young University Press, 2000), Introduction. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Al-Ghazālī, Tahāfut al-Falāsifa, Discussions 13, 16 and 20 on divine knowledge, bodily resurrection and the eternity of the world. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Al-Ghazālī, Tahāfut al-Falāsifa, Discussion 17, the celebrated example of fire and cotton. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ibn Rushd, Tahāfut al-Tahāfut (The Incoherence of the Incoherence), trans. Simon van den Bergh (London: Luzac, 1954), Introduction. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Ibn Rushd, Faṣl al-Maqāl (The Decisive Treatise), trans. Charles E. Butterworth (Provo: Brigham Young University Press, 2001). <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Majid Fakhry, A History of Islamic Philosophy, 3rd ed. (New York: Columbia University Press, 2004), on the decline of the falsafa tradition after Ibn Rushd. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Fakhry, A History of Islamic Philosophy, on the Latin reception of Ibn Rushd as "the Commentator." <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-amman-message-and-a-common-word', 'photo' => array( 'name' => 'amman-mosque', 'alt' => 'The Amman Message: the King Hussein Mosque in Amman, Jordan' ), 'type' => 'post', 'slug' => 'amman-message-and-a-common-word', 'title' => 'The Amman Message and A Common Word',
			'excerpt' => 'Two landmark declarations: a modern Muslim consensus on who is a Muslim, and an open letter to Christian leaders.', 'description' => 'The Amman Message and A Common Word Between Us and You: two major declarations. Read what each one says.', 'categories' => array( 'interfaith-studies' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Amman Message of 2004 and A Common Word of 2007 opened a new chapter in Muslim relations with others. Interfaith dialogue in the modern era surveys the field broadly; two documents from the past two decades deserve closer attention, since together they represent the largest formal consensus statements the Muslim scholarly world has produced on, respectively, its own internal unity and its relationship with Christianity. Both texts were drafted by scholars and endorsed by political and religious leaders across the Muslim world, and both remain open for anyone to read and sign.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-amman-message">The Amman Message</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-common-word">A Common Word Between Us and You</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-these-documents-do">What these documents do</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="al-azhar" alt="The courtyard of al-Azhar Mosque in Cairo, whose Grand Shaykh was among the Amman Message’s signatories" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-amman-message"} -->
<h2 class="wp-block-heading" id="the-amman-message">The Amman Message</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In November 2004, King Abdullah II of Jordan issued a statement seeking to define what Islam is and is not.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>In July 2005 an international gathering of two hundred Muslim scholars from fifty countries, meeting in Amman, ratified three points: a definition of a Muslim recognising the validity of the recognised schools of Islamic law and theology, a prohibition on declaring any adherent of those schools an apostate, and conditions restricting who may issue a binding legal opinion.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Over the following year the three points were adopted by the Organisation of the Islamic Conference and by the International Islamic Fiqh Academy of Jeddah, and more than five hundred scholars worldwide, including the Shaykh al-Azhar, endorsed the document.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> It is a statement of internal Muslim consensus, and its scale is itself a form of authority: agreement of this breadth across the Muslim world’s major schools is without precedent in modern Islamic history.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-common-word"} -->
<h2 class="wp-block-heading" id="a-common-word">A Common Word Between Us and You</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In October 2007, 138 Muslim scholars and leaders, representing every major school and region of the Muslim world, sent an open letter to the leaders of the Christian churches, including Pope Benedict XVI and the Archbishop of Canterbury.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> It argued, from verses of the Qur'an and the Bible set side by side, that love of God and love of neighbour form common ground between the two religions comprising over half of humanity, and that peace between them is a condition for peace in the world.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The Archbishop of Canterbury called it a landmark in Muslim-Christian relations, and Pope Benedict XVI referred to it approvingly in a later address in Amman.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-these-documents-do"} -->
<h2 class="wp-block-heading" id="what-these-documents-do">What these documents do</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Both documents leave real theological disagreement in place: A Common Word deliberately narrows its claim to two shared commandments, and the Amman Message addresses Muslims about Muslims. Their significance lies in scale and in source: statements of this kind, signed by ruling religious authorities across the Muslim world's major branches, carry a weight that individual commentary cannot. See <a href="/journal/interfaith-dialogue/">Interfaith dialogue in the modern era</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/interfaith-dialogue/">Interfaith dialogue in the modern era</a> and <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a>, <a href="/journal/apostasy-in-the-abrahamic-faiths/">Apostasy in the Abrahamic traditions</a>, <a href="/journal/war-and-peace/">War and peace in the Abrahamic traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="king-abdullah-mosque" alt="The King Abdullah I Mosque in Amman, Jordan" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">The Royal Aal al-Bayt Institute for Islamic Thought, The Amman Message (Amman: 2009), 1, 16. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">The Amman Message, Grand List of Signatories, 23-82. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">The Amman Message, Introduction, v-vi. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">A Common Word Between Us and You (Amman: The Royal Aal al-Bayt Institute for Islamic Thought, 13 October 2007), covering letter and list of signatories. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">A Common Word Between Us and You, citing <a href="https://quran.com/3/64">Qur'an 3:64</a> and the double commandment of Mark 12:29-31. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Rowan Williams, foreword to A Common Word Between Us and You, 2010 edition; Pope Benedict XVI, address at the King Hussein Mosque, Amman, 9 May 2009. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-cairo-genizah', 'photo' => array( 'name' => 'genizah', 'alt' => 'The Cairo Genizah: the interior of the Ben Ezra Synagogue in Cairo, Egypt' ), 'type' => 'post', 'slug' => 'the-cairo-genizah', 'title' => 'The Cairo Genizah',
			'excerpt' => 'A synagogue storeroom in Cairo yielded 400,000 medieval fragments and reshaped the study of Jewish history.', 'description' => 'The Cairo Genizah: Solomon Schechter\'s 1896 discovery and what its 400,000 fragments reveal. Read the story.', 'categories' => array( 'archaeology', 'interfaith-studies' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Cairo Genizah refounded a discipline. A single storeroom transformed how scholars study medieval Jewish life, and along the way produced one more piece of physical evidence for how a scripture is preserved.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#what-a-genizah-is">What a genizah is</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-discovery">The discovery</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-it-contains">What it contains</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#why-it-matters-here">Why it matters here</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="cambridge-library" alt="Cambridge University Library, home to the Taylor-Schechter Genizah Collection" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-a-genizah-is"} -->
<h2 class="wp-block-heading" id="what-a-genizah-is">What a genizah is</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A <em>genizah</em> (<span lang="he" dir="rtl">גניזה</span>, hiding place) is a storeroom where worn or damaged texts bearing the name of God are set aside, since Jewish law forbids their destruction. The Ben Ezra Synagogue in Fustat, Old Cairo, kept one for close to a thousand years, from the sixth century CE into the nineteenth.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-discovery"} -->
<h2 class="wp-block-heading" id="the-discovery">The discovery</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Fragments had trickled onto the antiquities market for decades before Solomon Schechter, a professor of rabbinic literature at Cambridge, examined a sample brought to him by two Scottish sisters in 1896 and recognised its importance. He travelled to Cairo, gained the community's permission to remove what remained, and returned to Cambridge with roughly 193,000 fragments, now the Taylor-Schechter Genizah Collection.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Further fragments, dispersed earlier or acquired later, are held at the Jewish Theological Seminary, the John Rylands Library in Manchester, and other collections; the whole find is now estimated at some 400,000 fragments.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-it-contains"} -->
<h2 class="wp-block-heading" id="what-it-contains">What it contains</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Most of the material is mundane: letters, contracts, court records and shopping lists, written in Hebrew script across Hebrew, Judaeo-Arabic and Aramaic. Its worth lies in that ordinariness: it documents everyday medieval Jewish, and often Muslim and Christian, life in a way literary sources never do.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Among the fragments are also biblical manuscripts and a Hebrew text of Ben Sira (Ecclesiasticus), previously known only in Greek translation, whose identification by Schechter first alerted him to the Genizah's significance.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"why-it-matters-here"} -->
<h2 class="wp-block-heading" id="why-it-matters-here">Why it matters here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Genizah's biblical fragments sit alongside the Dead Sea Scrolls and the Aleppo and Leningrad Codices as part of the manuscript evidence for how the Hebrew Bible reached its present form. Its far larger documentary record also preserves direct evidence of Jewish life under early Muslim rule in Egypt, the everyday counterpart to the formal protected status Jews held under Muslim rulers. See <a href="/journal/transmission-of-scripture/">The preservation and transmission of scripture</a> and <a href="/reference/sacred-texts/tanakh/">The Tanakh</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/transmission-of-scripture/">The preservation and transmission of scripture</a> and <a href="/journal/archaeology-and-scripture/">What archaeology tells us about the ancient Near East</a>, <a href="https://www.lib.cam.ac.uk/collections/departments/taylor-schechter-genizah-research-unit">The Genizah Research Unit, Cambridge University Library</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="genizah-fragment" alt="A legal document from the Cairo Genizah, one of some 400,000 fragments recovered from the storeroom" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the Cairo Genizah</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">S. D. Goitein, A Mediterranean Society, vol. 1 (Berkeley: University of California Press, 1967), 1-9. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Adina Hoffman and Peter Cole, Sacred Trash: The Lost and Found World of the Cairo Geniza (New York: Nextbook/Schocken, 2011), on Schechter's 1896-97 expedition and the Taylor-Schechter Collection. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Rebecca J. W. Jefferson, &quot;Deconstructing &#8216;The Cairo Genizah&#8217;: A Fresh Look at Genizah Manuscript Discoveries in Cairo before 1897,&quot; Journal of the American Oriental Society, on the collection's dispersal and estimated total. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Goitein, A Mediterranean Society, vol. 1, Introduction, on the documentary character of the find. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Solomon Schechter, &quot;A Fragment of the Original Text of Ecclesiasticus,&quot; The Expositor 55 (1896): 1-15. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:haman-in-the-quran', 'photo' => array( 'name' => 'luxor-obelisk', 'alt' => 'Haman: the obelisk and pylon of the Luxor Temple, part of the New Kingdom temple complex dedicated to Amun' ), 'type' => 'post', 'slug' => 'haman-in-the-quran', 'title' => 'Haman in the Qur’an',
			'excerpt' => 'Was the Qur\'an\'s Haman borrowed from the Bible\'s Esther, or is his name an Egyptian priestly title?', 'description' => 'Critics say Haman is borrowed from Esther. Read the case that his name is an Egyptian priestly title instead.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 0, 'since' => 43, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Among the figures the Qur’an places in Pharaoh’s court, none has drawn sharper criticism than Haman. Named six times, he is the official Pharaoh orders to build a tower reaching toward the heavens.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Western Orientalists have long pointed to a difficulty: a Haman appears in the Bible too, centuries later and in a different empire.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-objection">The objection</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#is-the-biblical-source-itself-reliable">Is the biblical source itself reliable?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#haman-as-an-egyptian-title">Haman as an Egyptian title</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-candidate-bakenkhons">A candidate: Bakenkhons</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-correction-along-the-way">A correction along the way</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#where-the-question-stands">Where the question stands</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="karnak-hypostyle" alt="Columns of the Hypostyle Hall at the temple of Amun in Karnak, expanded during the reign of Ramesses II" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-objection"} -->
<h2 class="wp-block-heading" id="the-objection">The objection</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Bible’s Haman is a Persian official at the court of Ahasuerus (identified with Xerxes I), who plots the destruction of the Jews in the Book of Esther, set roughly a thousand years after Moses.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Since the Qur’an places a Haman at Pharaoh’s side instead, a line of scholars from the seventeenth century onward concluded that Muhammad had confused the two settings.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Theodor Nöldeke put it bluntly in his 1891 Encyclopædia Britannica article: "The most ignorant Jew could never have mistaken Haman... for the minister of the Pharaoh."<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Similar verdicts came from Alphonse Mingana, Henri Lammens and Arthur Jeffery, and the point still appears in reference works: the second edition of the Encyclopaedia of Islam calls the placement of Haman at Pharaoh’s court "a still unexplained confusion."<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"is-the-biblical-source-itself-reliable"} -->
<h2 class="wp-block-heading" id="is-the-biblical-source-itself-reliable">Is the biblical source itself reliable?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The objection assumes the Book of Esther gives a historically dependable account of a real official named Haman. That assumption is not shared by the scholars who study Esther closely. Jon Levenson, of Harvard Divinity School, writes that "the historical problems with Esther are so massive as to persuade anyone... to doubt the veracity of the narrative."<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Michael Fox, a specialist in Hebrew and Egyptian literature at the University of Wisconsin, catalogues the book’s implausibilities and concludes it gives "the impression of a writer recalling a vaguely remembered past."<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Adele Berlin, an editor of the Jewish Study Bible, notes that a succession of twentieth-century commentators, writing between 1908 and 1997, each independently concluded the book is not historical.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> No source outside the Bible attests to a Haman, a Mordecai or a Jewish queen at the Persian court, and the wife of the historical Xerxes is known by a different name, Amestris.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Whatever the Qur’an’s Haman is, he cannot be measured against a firmly established biblical figure, because Esther’s own Haman is not one.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"haman-as-an-egyptian-title"} -->
<h2 class="wp-block-heading" id="haman-as-an-egyptian-title">Haman as an Egyptian title</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A different line of scholarship, running from Sher Mohammad Syed in 1980 through Abdurrahman Badawi and Muhammad Asad, has proposed that Haman in the Qur’an is an Arabized form of an Egyptian title.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> The Qur’an’s own usage offers a precedent: it calls Joseph’s ruler "the king" but calls Moses’ ruler "Pharaoh," a title derived from the Egyptian per-aa, "the great house," which came to denote the king himself only in the New Kingdom.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The proposal is that Haman works the same way, echoing imn or amana, the Egyptian god Amun, whose name formed part of several priestly and administrative titles, from the ordinary wab-priest up to the ḥm-nṯr-tpy, the High Priest of Amun, and, in at least one inscription, an architect’s title as well.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup> On this reading, the Qur’an’s Haman held the office of High Priest of Amun, a position that combined religious authority with charge of major construction.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-candidate-bakenkhons"} -->
<h2 class="wp-block-heading" id="a-candidate-bakenkhons">A candidate: Bakenkhons</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>If the office is High Priest of Amun under Ramesses II, one holder fits unusually well: Bakenkhons, who served roughly seventy years in the priesthood and held the title "Chief of Works." His own inscription, translated by the Egyptologist Kenneth Kitchen, records that he built a temple for Ramesses II and "erected obelisks in it, of granite stone, whose beauty reached up to the sky."<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> That phrase echoes the Qur’an’s account of Haman commanded to build so that Pharaoh might reach the heavens.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup> One of the obelisks Bakenkhons raised still stands at the Luxor Temple, its partner now in the Place de la Concorde in Paris.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-correction-along-the-way"} -->
<h2 class="wp-block-heading" id="a-correction-along-the-way">A correction along the way</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Not every proposed link has held up. An earlier attempt connected Haman to an inscription reading ḥmn-ḥ on a door jamb naming an overseer of stonemasons; on review by the Egyptologist Jürgen Osing of the Freie Universität Berlin, the final ḥ proved to belong to the name itself, and the office, that of a local overseer, sat too low in rank to fit the Qur’an’s Haman.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> The identification was withdrawn once the correction was made, which is worth stating plainly: a proposal built on inscriptional evidence has to give way when the inscription is read more carefully.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"where-the-question-stands"} -->
<h2 class="wp-block-heading" id="where-the-question-stands">Where the question stands</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The title theory is a minority position. Most specialists in Qur’anic studies, including Adam Silverstein in the most detailed modern treatment of the question, continue to hold that the Qur’an’s Haman descends literarily from the Book of Esther, by way of later commentary and legend.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup> The narrower conclusion holds: the case against the Qur’an cannot rest on treating Esther’s Haman as settled history, since mainstream biblical scholarship does not treat him that way, and an Egyptian derivation of the name remains a live, evidenced alternative, tied to a specific office and a specific candidate. See <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="persepolis" alt="Ruins at Persepolis, a ceremonial capital of the Achaemenid Persian empire in which the Book of Esther is set" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/28/6">Qur'an 28:6</a>, 8, 38; 29:39; 40:24, 36-37. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Esther 3:1-10:3. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Theodor Nöldeke, "The Koran," Encyclopædia Britannica, 9th edn, vol. 16 (Edinburgh: Adam and Charles Black, 1891), p. 600. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">"Hāmān," Encyclopaedia of Islam, 2nd edn. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Jon D. Levenson, Esther: A Commentary (Louisville: Westminster John Knox Press, 1997), p. 26. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Michael V. Fox, Character and Ideology in the Book of Esther (Columbia: University of South Carolina Press, 1991), p. 131. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Adele Berlin, Esther (Philadelphia: Jewish Publication Society, 2001), pp. xvi-xvii. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">The Universal Jewish Encyclopedia, s.v. "Esther." <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Sher Mohammad Syed, "Haman in the Light of the Qur’an," Islamic Quarterly 24 (1980): 48-59; Muhammad Asad, The Message of the Qur’an (Gibraltar: Dar al-Andalus, 1980), note to Qur’an 28:6. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">A. H. Johns, "Firʿawn," Encyclopaedia of the Qur’an, vol. 2, citing the New Kingdom origin of the title "Pharaoh." <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Wörterbuch der Aegyptischen Sprache and Lexikon der Ägyptischen Götter und Götterbezeichnungen, entries under ḳmn and ʾimn, on the priestly and architectural titles compounded with the name of Amun. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">K. A. Kitchen, Ramesside Inscriptions, Translated and Annotated: Translations, vol. III (Oxford: Blackwell, 1996-2000), the biographical inscription of Bakenkhons. <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Qur'an 40:36-37. <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">Personal communication from Jürgen Osing, Ägyptologisches Seminar, Freie Universität Berlin, July 2009, on the door-jamb inscription of ḳmn-ḥ in the Kunsthistorisches Museum, Vienna. <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-15">A. Silverstein, "Hāmān’s Transition from Jāhiliyya to Islam," Jerusalem Studies in Arabic and Islam 34 (2008, published 2009): 285-308. <a href="#ref-15" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-population-of-the-abrahamic-religions', 'photo' => array( 'name' => 'lagos-skyline', 'alt' => 'Population: lagos, Nigeria, one of the fast-growing cities of sub-Saharan Africa' ), 'type' => 'post', 'slug' => 'population-of-abrahamic-religions', 'title' => 'The population of the Abrahamic religions',
			'excerpt' => 'Pew Research projects Islam and Christianity nearing parity by 2050, and Islam becoming the largest religion by 2060 or later.', 'description' => 'The population of the Abrahamic religions: 2020 figures, growth and the shift south. See the numbers and read more.', 'categories' => array( 'religion', 'history' ), 'days_ago' => 0, 'since' => 45, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>How many people belong to each Abrahamic tradition, and how is that changing? The most detailed answer comes from the Pew Research Center, which in 2015 published the first large-scale demographic projections of the world’s religions, built from more than 2,500 censuses, surveys and population registers.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-present-picture">The present picture</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-latest-count-2020">The latest count: 2020</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-drives-the-difference">What drives the difference</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-projection-to-2050-and-2060">The projection to 2050 and 2060</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#where-christians-will-live">Where Christians will live</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-historical-footnote">A historical footnote</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-limits-of-a-projection">The limits of a projection</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>[abr_photo name="population-density-map" alt="A world population density map, 2020" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-present-picture"} -->
<h2 class="wp-block-heading" id="the-present-picture">The present picture</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>As of Pew’s baseline year, Christians were the largest religious group in the world, with Muslims second.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Jews were, and remain, by far the smallest group for which Pew produced a separate projection, numbering a little under 14 million worldwide, some 0.2 per cent of the global population.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Mandaeism, with a global community numbered in the tens of thousands, falls beneath the threshold at which census and survey data allow a demographer to project it separately at all; it appears in no study of this kind, Pew’s included.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-latest-count-2020"} -->
<h2 class="wp-block-heading" id="the-latest-count-2020">The latest count: 2020</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In June 2025 Pew published its first full count since that baseline, drawn from more than 2,700 censuses and surveys and covering the decade from 2010 to 2020.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Christians remained the largest religious group in the world, with about 2.3 billion people, or 28.8% of the world’s population, although their share fell by 1.8 percentage points.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Muslims were the fastest-growing group of the decade: their number rose by 347 million, more than all other religions combined, to about 2.0 billion, or 25.6% of humanity.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The number of Jews rose by nearly one million to 14.8 million, still about 0.2%. Together the three Abrahamic groups made up about 54.6% of the world’s population in 2020, more than half of humanity.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_diagram name="world-religions" caption="The world’s religious groups in 2020, as a share of the world population. Source: Pew Research Center, 2025."]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>The count also confirmed the shift in where Christians live. By 2020 sub-Saharan Africa was home to 30.7% of the world’s Christians, against 22.3% in Europe, the result of higher birth rates in Africa and of widespread disaffiliation in Western Europe.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-drives-the-difference"} -->
<h2 class="wp-block-heading" id="what-drives-the-difference">What drives the difference</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Pew traces future change mainly to fertility and age, with conversion a smaller factor. Globally, Muslim women have the highest fertility of any major religious group, an average of 3.1 children, against 2.7 for Christians and 2.3 for Jews, all above the replacement level of 2.1.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Muslims also have the youngest median age of any group Pew measured, seven years below the median for non-Muslims, which means a larger share of Muslims are approaching the years in which people have children.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> Both patterns concentrate in sub-Saharan Africa and parts of Asia, where Muslim and Christian populations are both growing quickly, while the regions where the religiously unaffiliated are concentrated, Europe, North America, China and Japan, have low fertility and ageing populations.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-projection-to-2050-and-2060"} -->
<h2 class="wp-block-heading" id="the-projection-to-2050-and-2060">The projection to 2050 and 2060</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>On these trends, Pew’s central projection has Christians and Muslims reaching near parity by 2050, at 2.9 billion (31 per cent of the world’s population) and 2.8 billion (30 per cent) respectively, the first time in history the two would stand so close.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>A later Pew analysis, extending the same model to 2060, projects that Muslims would overtake Christians as the world’s largest religious group in the second half of the century, growing 70 per cent between 2015 and 2060 against 32 per cent for the world’s population as a whole.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> The Jewish population is projected to keep growing in absolute terms, to about 16.1 million by 2050, while continuing to decline slightly as a share of the world’s much faster-growing population.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"where-christians-will-live"} -->
<h2 class="wp-block-heading" id="where-christians-will-live">Where Christians will live</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The same projections show Christianity shifting its centre of gravity. In 2010 the world’s Christians were spread almost evenly across Europe (26 per cent), Latin America and the Caribbean (25 per cent) and sub-Saharan Africa (24 per cent), while fewer than 1 per cent lived in the Middle East and North Africa, the region where the faith began.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>By 2050 Pew projects that 38 per cent of the world’s Christians will live in sub-Saharan Africa and only about 16 per cent in Europe, the one region where the number of Christians is expected to fall in absolute terms, from 553 million to 454 million.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> Nigeria is projected to hold the world’s third-largest Christian population by mid-century, although Christians would then make up only 39 per cent of its people.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Conversion plays a modest part worldwide and a larger one in the West. Pew projects net losses to Christianity through religious switching in North America, Europe and Latin America, most of it toward no religious affiliation: without switching, Christians would make up about 75 per cent of North America’s population in 2050, against 66 per cent once switching is counted. In sub-Saharan Africa, where the number of Christians is expected to more than double, their share of the population is still projected to slip from 63 to 59 per cent, because the region’s Muslim population is growing faster still.<sup class="abr-fn"><a href="#note-16" id="ref-16">16</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="jakarta-istiqlal" alt="The Istiqlal Mosque in Jakarta, Indonesia, seen across the skyline of the country with the world’s largest Muslim population" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-historical-footnote"} -->
<h2 class="wp-block-heading" id="a-historical-footnote">A historical footnote</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Pew’s researchers also asked historians when Christians and Muslims were last so close in number. Most hold that Christians have always outnumbered Muslims worldwide since Islam’s rise in the seventh century, given Christianity’s six-century head start. A minority view, associated with the Oxford demographer David Coleman and the Columbia historian Richard Bulliet, holds that Muslims may briefly have outnumbered Christians sometime between 1000 and 1600 CE, as Muslim populations expanded while plague, above all the Black Death, cut deeply into Europe’s Christian population. Pew is careful to note that estimates for this period carry wide uncertainty.<sup class="abr-fn"><a href="#note-17" id="ref-17">17</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-limits-of-a-projection"} -->
<h2 class="wp-block-heading" id="the-limits-of-a-projection">The limits of a projection</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The projections are conditional. Pew’s own report says plainly that the projections describe what would follow if current fertility, mortality, migration and conversion patterns continue, and that events ranging from conflict to economic change can move demographic trends in ways no model can foresee; this is why the projections stop at a bounded window of forty to forty-five years.<sup class="abr-fn"><a href="#note-18" id="ref-18">18</a></sup> Read that way, the figures describe a trajectory, open to revision as its assumptions change. See <a href="/religions/islam/">Islam</a> and <a href="/religions/christianity/">Christianity</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="https://www.pewresearch.org/religion/2025/06/09/how-the-global-religious-landscape-changed-from-2010-to-2020/">How the global religious landscape changed (Pew Research Center)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on population</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Conrad Hackett et al., "The Future of World Religions: Population Growth Projections, 2010-2050" (Washington, DC: Pew Research Center, 2 April 2015). <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Hackett et al., "The Future of World Religions," Overview. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ibid., ch. 2, "Jews." <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Pew Research Center, “How the Global Religious Landscape Changed From 2010 to 2020,” 9 June 2025. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Pew Research Center, “Islam was the world’s fastest-growing religion from 2010 to 2020,” short read, 10 June 2025; Pew Research Center, “How the Global Religious Landscape Changed From 2010 to 2020,” 9 June 2025. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Pew Research Center, “How the Global Religious Landscape Changed From 2010 to 2020,” 9 June 2025; the combined share is the sum of Pew’s figures for Christians, Muslims and Jews. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Pew Research Center, “How the Global Religious Landscape Changed From 2010 to 2020,” 9 June 2025. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Ibid., ch. 1, "Fertility." <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Michael Lipka and Conrad Hackett, "Why Muslims Are the World’s Fastest-Growing Religious Group," Pew Research Center, 6 April 2017 (an update of an article first published 23 April 2015). <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Hackett et al., "The Future of World Religions," Overview. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Ibid., Overview and ch. 2, "Christians" and "Muslims." <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">Lipka and Hackett, "Why Muslims Are the World’s Fastest-Growing Religious Group." <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Hackett et al., "The Future of World Religions," ch. 2, "Jews." <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">Hackett et al., "The Future of World Religions," ch. 2, "Christians," "Regional Change." <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-15">Ibid., "Change in Countries With Largest Christian Populations." <a href="#ref-15" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-16">Ibid., "Regional Change" and "Demographic Characteristics of Christians That Will Shape Their Future." <a href="#ref-16" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-17">Ibid., Overview, note 2, citing Todd M. Johnson, Houssain Kettani, David Coleman and Richard W. Bulliet. <a href="#ref-17" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-18">Ibid., Overview, "Why Do Some Religious Groups Grow Faster Than Others?" <a href="#ref-18" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:paul-and-peter-two-missions', 'photo' => array( 'name' => 'antioch', 'alt' => 'Paul and Peter: the modern city of Antakya, Turkey, on the site of ancient Antioch, where Paul confronted Peter' ), 'type' => 'post', 'slug' => 'paul-and-peter-two-missions', 'title' => 'Paul and Peter: two missions in the early church',
			'excerpt' => 'Paul\'s own letters describe a real conflict with Peter at Antioch. A later letter, in Peter\'s name, makes peace.', 'description' => 'Paul and Peter led two missions in the early church: to the Gentiles and to the Jews. Their clash at Antioch, explained. Read it.', 'categories' => array( 'history', 'scripture' ), 'days_ago' => 0, 'since' => 46, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The New Testament is often read as the record of a single, unified church. Its own earliest documents, Paul’s own letters, tell a rougher story: a real and public dispute between Paul and Peter over what a Gentile had to do to belong to the church of a Jewish messiah.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-confrontation-at-antioch">The confrontation at Antioch</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#two-accounts-one-earlier-and-franker">Two accounts, one earlier and franker</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-later-letter-makes-peace">A later letter makes peace</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-pattern-shows">What the pattern shows</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<!-- wp:heading {"anchor":"the-confrontation-at-antioch"} -->
<h2 class="wp-block-heading" id="the-confrontation-at-antioch">The confrontation at Antioch</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Paul’s own account, in his letter to the Galatians, is the earliest first-hand record of any dispute in the church’s history. At Antioch, where Paul had preached for years, Jewish and Gentile Christians had been eating together without regard to Jewish dietary law. When representatives from the Jerusalem church, associated with James, the brother of Jesus, arrived, Peter stopped eating with the Gentile believers.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Paul says he "opposed him to his face, because he stood condemned," accusing Peter of hypocrisy: eating as a Gentile when it suited him, then compelling Gentiles to live as Jews once the Jerusalem party appeared.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Even Barnabas, Paul’s own missionary partner, sided with Peter.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The split was not confined to Antioch: in Corinth, a church Paul had founded, some believers were still identifying themselves by faction years later, “I belong to Paul,” others, “I belong to Cephas,” Peter’s Aramaic name.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The New Testament scholar Michael Goulder, in a study of the earliest decades of the church, reads the incident as a genuine defeat for Paul at the time: "the die had been cast by now, and the Peter party, the Petrines, had won the round."<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Paul’s own Gentile mission would eventually prevail as a matter of practice, since Christians today keep neither kosher law nor circumcision, but that outcome was not obvious in the moment, and Paul’s letter to the Galatians was written partly to fight a battle he had already lost once.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="corinth" alt="The ruins of ancient Corinth, whose church Paul founded and where believers later divided into rival factions" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"two-accounts-one-earlier-and-franker"} -->
<h2 class="wp-block-heading" id="two-accounts-one-earlier-and-franker">Two accounts, one earlier and franker</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Acts of the Apostles gives a second account of the underlying dispute, at what is usually called the Jerusalem council, and its tone is markedly more harmonious than Paul’s own letter.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Goulder describes Acts’ version as inflated, turning what was probably a private meeting into something resembling a full council, though the letter Acts records afterward, asking Gentile converts to abstain from food sacrificed to idols, from blood and from sexual immorality, likely reflects the terms actually agreed.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Paul’s letters, written by a participant close to the events, and Acts, written a generation or more later by an author working to present a unified church, read as two angles on the same conflict, one considerably more willing than the other to let it show.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="chester-beatty-romans" alt="A leaf of the Chester Beatty papyrus of Paul’s letters, copied around the early third century" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-later-letter-makes-peace"} -->
<h2 class="wp-block-heading" id="a-later-letter-makes-peace">A later letter makes peace</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A different kind of evidence for the same underlying tension comes from the New Testament’s own account of itself. The Second Letter of Peter closes by describing the letters of "our beloved brother Paul" as containing "some things hard to understand," which the "ignorant and unstable twist to their own destruction, as they do the other scriptures."<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> The line does two things worth noticing. It places Paul’s letters, by implication, alongside "the other scriptures", and it puts Peter’s own authority behind Paul’s, addressing exactly the kind of dispute over Paul’s meaning that Goulder traces back to Antioch.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The United States Conference of Catholic Bishops’ own introduction to the letter states plainly that "among modern scholars there is wide agreement that 2 Peter is a pseudonymous work," written by someone other than the apostle "according to a literary convention popular at the time," and that many scholars regard it as the latest-written document in the New Testament, from the early or middle second century.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Among the reasons given: the letter refers to the apostles as a prior generation, already dead; it responds to a settled collection of Paul’s letters, well known enough that disputes had already arisen over how to read them; and its account of false teachers borrows extensively from the Letter of Jude, in a direction scholars agree runs from Jude to 2 Peter and not the reverse.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> Even the early church was divided on the letter’s authenticity: Origen, in the early third century, is the earliest writer to mention it at all, and reports that others rejected it outright, a doubt that persisted in some churches into the fifth century.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-pattern-shows"} -->
<h2 class="wp-block-heading" id="what-the-pattern-shows">What the pattern shows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Read together, the evidence describes a progression. Paul’s own letters preserve an open, personal conflict with Peter over the terms of Gentile membership in the church. Acts, writing later, softens the same conflict into a council reaching friendly agreement. A letter written in Peter’s name, later still, goes a step further and places apostolic authority explicitly behind Paul, folding his letters into scripture and warning against misreading them. The dispute receded because later generations of the church wrote it into a settled peace.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-parting-of-the-ways/">The parting of the ways</a>, <a href="/journal/the-council-of-nicaea/">The Council of Nicaea, 325</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Paul and Peter</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://www.biblegateway.com/passage/?search=Galatians+2:11&amp;version=NRSVUE">Galatians 2:11</a>-14. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Galatians 2:13. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">1 Corinthians 1:12. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Michael D. Goulder, St. Paul versus St. Peter: A Tale of Two Missions (Louisville: Westminster/John Knox Press, 1995), p. 3. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Ibid., pp. 2-3. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Ibid., p. 26; Acts 15:1-29. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">2 Peter 3:15-16. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">"The Second Letter of Peter," Introduction, New American Bible, Revised Edition (United States Conference of Catholic Bishops, USCCB.org). <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Ibid. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Ibid. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:apostasy-in-the-abrahamic-traditions', 'photo' => array( 'name' => 'vilna-talmud', 'alt' => 'Apostasy: a page of the Babylonian Talmud in the Vilna edition' ), 'type' => 'post', 'slug' => 'apostasy-in-the-abrahamic-faiths', 'title' => 'Apostasy in the Abrahamic traditions',
			'excerpt' => 'Rabbinic law, Christian empire, classical Islamic jurisprudence and modern reconsideration: how each tradition has treated those who leave.', 'description' => 'Apostasy in Judaism, Christianity, Islam and Mandaeism: the law, its history and modern debate compared. Read on.', 'categories' => array( 'religion', 'history' ), 'days_ago' => 0, 'since' => 48, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Apostasy, the abandonment of one’s faith, has been treated differently across the traditions. Every one of the Abrahamic traditions has had to decide what becomes of a member who leaves. The answers differ sharply, and each has changed over time: from the rabbinic insistence that a Jew remains a Jew, through the Christian empire’s civil penalties and the medieval Church’s death sentence for heresy, to the classical Islamic jurists’ capital ruling and the modern Muslim scholarship that has reopened it.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#judaism-once-an-israelite">Judaism: once an Israelite</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#christianity-from-civil-penalty-to-religious-freedom">Christianity: from civil penalty to religious freedom</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#islam-scripture-law-and-reconsideration">Islam: scripture, law and reconsideration</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mandaeism-a-closed-community">Mandaeism: a closed community</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-modern-case-malaysia">A modern case: Malaysia</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-comparison-shows">What the comparison shows</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"judaism-once-an-israelite"} -->
<h2 class="wp-block-heading" id="judaism-once-an-israelite">Judaism: once an Israelite</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Hebrew Bible prescribes death for one who entices others to serve other gods.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Rabbinic law, however, settled on a principle drawn from the story of Achan: an Israelite who has sinned remains an Israelite.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>In practice the principle meant that a Jew who adopted another religion kept the family obligations and rights of a Jew: his marriage stood, a divorce still required his writ, and he could still inherit.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> The standard modern reference work on Judaism states the consequence plainly: in Jewish religious law it is technically impossible for a Jew to change religion.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Later authorities distinguished the provocative apostate from the one who left for convenience, and some medieval jurists took a harder line on the descendants of converts, but the governing principle has held.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"christianity-from-civil-penalty-to-religious-freedom"} -->
<h2 class="wp-block-heading" id="christianity-from-civil-penalty-to-religious-freedom">Christianity: from civil penalty to religious freedom</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The first Christians suffered for their faith and could not punish anyone for leaving it. Once the Roman Empire became Christian, apostasy turned into a civil offence. A law of 381 CE, preserved in the code compiled under Theodosius II, stripped Christians who had become pagans of the right to make a will; a law of 391 CE barred those who had "betrayed the holy faith" from giving testimony and from inheriting.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> In the thirteenth century Thomas Aquinas argued that heretics, who corrupt the faith, deserve excommunication and also death at the hands of the secular authority, a judgement that shaped the practice of the Inquisition.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Catholic Church reversed that position in 1965. The Second Vatican Council declared that every person has a right to religious freedom and must be immune from coercion by any human power in matters of belief.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> The change is recent: the right that Western Christianity now defends as its own was, for most of its history, one it denied.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="vatican-council" alt="Bishops gathering in St Peter’s Square at the opening of the Second Vatican Council, 1962" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"islam-scripture-law-and-reconsideration"} -->
<h2 class="wp-block-heading" id="islam-scripture-law-and-reconsideration">Islam: scripture, law and reconsideration</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an condemns apostasy in strong terms and warns that the deeds of one who dies an unbeliever are lost in this world and the next.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> It describes people who believed, disbelieved, believed again and disbelieved once more, which presumes that they were living among the believers throughout.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup> It prescribes no worldly punishment for apostasy anywhere in its text, and it states the principle that there is no compulsion in religion, <em>lā ikrāha fī al-dīn</em> (<span lang="ar" dir="rtl">لا إكراه في الدين</span>, no compulsion in religion).<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The classical jurists of all four Sunni schools nonetheless held that an adult male apostate who refused to repent after being invited to do so should be put to death, drawing on reports from the Prophet’s sayings and the wars against the tribes that broke away after his death.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> That ruling has been challenged from within the tradition itself.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Taha Jabir al-Alwani, a graduate of al-Azhar and a member of the Islamic Fiqh Academy of the Organisation of Islamic Cooperation, argued in a detailed study that neither the Qur’an nor the Sunnah mandates death for a change of belief alone, that the Prophet never put anyone to death for apostasy, and that the early penalties concerned apostasy joined to rebellion or treason against the community.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup> On this reading, leaving Islam is a grave sin answered in the next world, and the state’s concern begins only where the act becomes a crime against public order.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mandaeism-a-closed-community"} -->
<h2 class="wp-block-heading" id="mandaeism-a-closed-community">Mandaeism: a closed community</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeism does not seek converts, and belonging is a matter of birth and observance within the community. Marriage is arranged within Mandaean families, and a bride must come of a suitable Mandaean family with no taint of alien blood.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> For so small a community the practical question has been loss through marriage outside it and through emigration.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-modern-case-malaysia"} -->
<h2 class="wp-block-heading" id="a-modern-case-malaysia">A modern case: Malaysia</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Malaysia shows how these questions persist in a modern constitutional state. Its Federal Constitution defines a Malay as a person who professes Islam, habitually speaks Malay and conforms to Malay custom, so that a Malay who leaves Islam also leaves the constitutional category, and the special position it carries.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup> In 2007 the Federal Court, in a two to one decision, dismissed the appeal of Lina Joy, who sought to have "Islam" removed from her identity card, holding that a person who wishes to leave a religion must do so according to that religion’s own law, which for Muslims places the question before the Syariah courts.<sup class="abr-fn"><a href="#note-16" id="ref-16">16</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="putrajaya-justice" alt="The Palace of Justice in Putrajaya, seat of Malaysia’s Federal Court" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-comparison-shows"} -->
<h2 class="wp-block-heading" id="what-the-comparison-shows">What the comparison shows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism answered apostasy by refusing to let a Jew stop being one. Christianity and Islam, once each held political power, both attached severe penalties to leaving; Christianity abandoned them in the twentieth century under the pressure of the modern state, while in Islam the argument against the classical ruling has been made from the Qur’an itself, which never prescribed it. See <a href="/religions/islam/">Islam</a>, <a href="/religions/christianity/">Christianity</a> and <a href="/religions/judaism/">Judaism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a> and <a href="/journal/amman-message-and-a-common-word/">The Amman Message and A Common Word</a>, <a href="/journal/religious-law/">Religious law in the Abrahamic traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on apostasy</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Deuteronomy 13:6-10. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Babylonian Talmud, Sanhedrin 44a, on Joshua 7:11. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Central Conference of American Rabbis, responsum "Apostate," citing Sanhedrin 44a and Avodah Zarah 26b. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Encyclopaedia Judaica, s.v. "Apostasy," vol. 3, p. 211, as quoted in "When Is a Jew Not a Jew?", Israel My Glory. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Central Conference of American Rabbis, op. cit., on the <em>mumar l’hachis</em> and <em>mumar l’teavon</em>; Responsa of Maharshdam, Even HaEzer 10, as discussed in Shmuel Kadosh, "Once a Jew, Always a Jew? Part 3," Kol Torah, 9 August 2018. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Codex Theodosianus 16.7.1 (381 CE) and 16.7.4 (391 CE), in the translation reproduced by Scroll Publishing; cf. "Apostasy," Encyclopedia of Religion, Encyclopedia.com. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Thomas Aquinas, Summa Theologiae II-II, q. 11, a. 3, trans. Fathers of the English Dominican Province (1920). <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Second Vatican Council, Dignitatis Humanae (7 December 1965), §2. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9"><a href="https://quran.com/2/217">Qur'an 2:217</a>. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Qur'an 4:137; cf. 3:86-90. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Qur'an 2:256. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">Taha Jabir al-Alwani, Apostasy in Islam: A Historical and Scriptural Analysis, trans. Nancy Roberts (London: International Institute of Islamic Thought, 2011), chapter "Muslim Jurists’ Views on the Penalty for Apostasy." <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Ibid., chapters "Apostasy during the Prophet’s Life" and "Response to Apostasy in the Verbal Sunnah"; cf. the review by the American Journal of Islam and Society (2013). <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), p. 59. <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-15">Federal Constitution of Malaysia, Article 160; Articles 11 and 153; cf. Radzuwan Ab Rashid and Azweed Mohamad, New Media Narratives and Cultural Influence in Malaysia (Singapore: Springer, 2019), pp. 1-2. <a href="#ref-15" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-16">Lina Joy v Majlis Agama Islam Wilayah Persekutuan & Ors [2007] 3 AMR 693 (Federal Court, 30 May 2007). <a href="#ref-16" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-sabians-in-classical-muslim-scholarship', 'photo' => array( 'name' => 'astrolabe-984', 'alt' => 'Classical Muslim scholarship: a planispheric astrolabe made in Iran in 984 CE' ), 'type' => 'post', 'slug' => 'sabians-in-classical-muslim-texts', 'title' => 'The Sabians in classical Muslim scholarship',
			'excerpt' => 'Three classical Muslim scholars on the Sabians, and why al-Shahrastani read Abraham\'s argument with the stars as a case against them.', 'description' => 'Classical Muslim scholars on the Sabians: who they were, Harran, and Abraham’s argument with the stars. Read on.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 51, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Qur’an names the Sabians, <em>al-Ṣābiʾūn</em> (<span lang="ar" dir="rtl">الصابئون</span>, the Sabians), three times, beside the Jews, the Christians and, once, the Magians.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Who they were has been argued over since the first commentators. Western scholarship has mostly concluded that the communities later known by the name, the star-venerating Harranians of northern Mesopotamia and the Mandaeans of southern Iraq, have little claim to it; Arabic scholarship, classical and modern, has tended to accept them.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> A 2023 thesis from the American University in Cairo by Maurice Hines takes the classical Muslim authors at their word and reads them as evidence in their own right.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#ibn-al-nadim-and-the-harranians">Ibn al-Nadīm and the Harranians</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#said-al-andalusi-and-the-first-religion">Ṣāʿid al-Andalusī and the first religion</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#al-shahrastani-abraham-against-the-stars">Al-Shahrastānī: Abraham against the stars</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-mandaean-answer">A Mandaean answer</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-case-for-the-classical-authors">The case for the classical authors</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"ibn-al-nadim-and-the-harranians"} -->
<h2 class="wp-block-heading" id="ibn-al-nadim-and-the-harranians">Ibn al-Nadīm and the Harranians</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ibn al-Nadīm, a Baghdad bookseller and copyist, completed his catalogue of the books in circulation in 377/987, at the height of the Abbasid translation movement.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> His account of the Harranians gives two pictures. In one they pray three times a day after ablution, fast, abstain from pork and keep purity rules close to those of Islam; in the other, their monthly rites to the planets resemble the mystery cults of the Greek world.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>He also preserves the best-known story about them. The caliph al-Maʾmūn, passing through Harran on campaign against Byzantium, asked what kind of protected people they were and gave them until his return to change their religion. A learned man among them advised them to call themselves Sabians, a name the Qur’an already recognised.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The story survives in Ibn al-Nadīm alone, and Hines doubts it happened as told; Harranian scholars were nonetheless calling themselves Sabians by the late ninth century.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Jurists from Harran itself later ruled that Muslims could not marry Harranian women, since the Harranians were not People of the Book. Muslim readers of the time, Hines concludes, did not take the Harranians for the Sabians of the Qur’an.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="harran-castle" alt="The old town and castle of Harran, in south-eastern Turkey" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"said-al-andalusi-and-the-first-religion"} -->
<h2 class="wp-block-heading" id="said-al-andalusi-and-the-first-religion">Ṣāʿid al-Andalusī and the first religion</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In the eleventh century the Toledo judge Ṣāʿid al-Andalusī wrote a history of the sciences that traces them to Sabian origins, treating Sabianism as the religion of the ancient nations before its decline.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> He described the pre-Islamic Arabs as monotheists who used idols to seek nearness to the one God. Hines explains the claim by that framework: if the first religion of every nation was monotheistic, its later idols were a corruption of it.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"al-shahrastani-abraham-against-the-stars"} -->
<h2 class="wp-block-heading" id="al-shahrastani-abraham-against-the-stars">Al-Shahrastānī: Abraham against the stars</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The fullest framework comes from al-Shahrastānī, writing in Khurasan in the twelfth century. He sets the Sabians against the <em>ḥunafāʾ</em> (<span lang="ar" dir="rtl">الحنفاء</span>, the pure monotheists). The Sabians approached the transcendent God through intermediaries: spiritual beings, the planets that house them, and the idols made to stand in for the planets when they could not be seen. The <em>ḥunafāʾ</em> held that a human prophet could stand above the angels and the stars.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Al-Shahrastānī then reads the Qur’an’s account of Abraham as a sustained argument against both forms of that worship. Abraham first refuted idol worship in words, then by demonstration, breaking the idols and leaving the largest standing. He then turned to the worshippers of the heavenly bodies, and his proof against them was that each star, the moon and the sun set and faded.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> Read this way, Abraham’s contemplation of the heavens in the sixth chapter of the Qur’an is a disputation with star worshippers, conducted on their own ground.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="sufi-fixed-stars" alt="The constellation Ophiuchus in a manuscript of al-Ṣūfī{Q}s tenth-century treatise on the fixed stars" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-mandaean-answer"} -->
<h2 class="wp-block-heading" id="a-mandaean-answer">A Mandaean answer</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Mandaeans, the one community still called Sabians in Iraq, tell the same history from the other side. Their legend makes Abraham a Mandaean priest, Bahram, who developed a sore and was circumcised. Since the Mandaean priesthood admits no maimed body, he left the community for the desert, and his later strength came from Yurba, a power of darkness.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Al-Bīrūnī reported a version of the story about the Harranians, taken from a Christian author who wrote against them.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup> E. S. Drower, who recorded the Mandaean legend, judged it a story invented to explain circumcision.<sup class="abr-fn"><a href="#note-16" id="ref-16">16</a></sup> The Mandaean legend and al-Shahrastānī’s reading of the Qur’an agree on one point: Abraham broke with a star-venerating priesthood, and those who followed him and those who stayed became two communities, the <em>ḥunafāʾ</em> and the Sabians.<sup class="abr-fn"><a href="#note-17" id="ref-17">17</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-case-for-the-classical-authors"} -->
<h2 class="wp-block-heading" id="the-case-for-the-classical-authors">The case for the classical authors</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Hines’s central claim is that the classical scholars understood the Sabians better than their modern critics allow. Had the Harranians chosen a Qur’anic name at random, he asks, why did they settle on Sabians, when Jews, Christians and Magians were equally available? The choice suggests that the name already carried recognisable marks, above all a devotion to the stars and to the angels thought to govern them.<sup class="abr-fn"><a href="#note-18" id="ref-18">18</a></sup> He reads the classical sources as describing an ancient theosophical religion that later prophets answered in turn, and ties this to the Qur’an’s statement that mankind was once a single community to which God then sent prophets.<sup class="abr-fn"><a href="#note-19" id="ref-19">19</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The thesis describes its own claims as bold, and it draws on modern esoteric writers alongside academic sources. The prevailing academic view, represented by Chwolsohn, de Blois and van Bladel, still separates the historical Harranians and Mandaeans from the Sabians the Qur’an names.<sup class="abr-fn"><a href="#note-20" id="ref-20">20</a></sup> The classical texts Hines gathers keep their value either way: they show Muslim scholars working from the Qur’an’s own account of Abraham to understand a religion they could still observe.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a>, <a href="/journal/who-was-abraham/">Who was Abraham?</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on classical Muslim scholarship</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/2/62">Qur'an 2:62</a>; 5:69; 22:17. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Maurice Hines, <em>Interpretatio Islamica and the Unraveling of the Ancient Sabian Mysteries</em> (MA thesis, American University in Cairo, 2023), p. 8. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ibid., pp. 5, 21-22. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ibid., pp. 26-27. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Ibid., pp. 48-50, citing Ibn al-Nadīm, <em>al-Fihrist</em>, pp. 442-448. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Ibid., pp. 50-51, citing <em>al-Fihrist</em>, pp. 445-446. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibid., p. 50, n. 69. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Ibid., pp. 51-52. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Ibid., p. 53. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Ibid., p. 56. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Ibid., pp. 63-64, citing al-Shahrastānī, <em>al-Milal wa al-Niḥal</em>, vol. 2, pp. 291, 352-353. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">Ibid., p. 64; Qur'an 6:74; 19:42; 21:63-65; 37:95-96. <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Qur'an 6:75-79; Hines, op. cit., p. 77. <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">E. S. Drower, <em>The Mandaeans of Iraq and Iran</em> (Oxford: Clarendon Press, 1937), pp. 265-266, 268. <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-15">Ibid., pp. 268-269. <a href="#ref-15" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-16">Ibid., p. 269. <a href="#ref-16" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-17">Hines, op. cit., p. 76. <a href="#ref-17" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-18">Ibid., p. 89. <a href="#ref-18" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-19">Ibid., pp. 68-69; Qur'an 2:213. <a href="#ref-19" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-20">Ibid., pp. 5, 17-18. <a href="#ref-20" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:abrahamic-family-tree', 'photo' => array( 'name' => 'abraham-cenotaph', 'alt' => 'The family tree: the cenotaph of Abraham in the Ibrahimi Mosque at the Cave of the Patriarchs, Hebron' ), 'type' => 'post', 'slug' => 'abrahamic-family-tree', 'title' => 'The Abrahamic family tree and what the traditions share',
			'excerpt' => 'Who descends from whom, and what the traditions hold in common: the family of Abraham and the beliefs Judaism, Christianity and Islam share, in two diagrams.', 'description' => 'A family tree of Abraham\'s descendants and a diagram of what Judaism, Christianity and Islam share. See both diagrams.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 54, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Two questions come up again and again about the Abrahamic religions, Judaism, Mandaeism, Christianity and Islam: how their founding figures are related, and what the traditions hold in common. The family tree below answers the first from the genealogies each tradition keeps; the diagram after it answers the second.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-family-of-abraham">The family of Abraham</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-traditions-share">What the traditions share</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-family-of-abraham"} -->
<h2 class="wp-block-heading" id="the-family-of-abraham">The family of Abraham</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Genesis traces Abraham back through Shem to Noah, and gives him two sons: Ishmael, born to Hagar, and Isaac, born to Sarah in old age.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> It names twelve sons of Ishmael, the first two being Nebaioth and Kedar, and twelve sons of Isaac’s son Jacob, the fathers of the tribes of Israel.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> From the tribe of Levi came Moses and Aaron and the priesthood; from the tribe of Judah came David. The Gospel of Matthew opens by calling Jesus the son of David and the son of Abraham, and Luke places John the Baptist in a priestly family descended from Aaron.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Qur’an keeps both sons in view. It names Ismāʿīl and Isḥāq together among the prophets, pairs Ismāʿīl with his father in raising the foundations of the Kaaba, and records Jacob’s sons pledging to worship the God of Ibrāhīm, Ismāʿīl and Isḥāq.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The earliest biography of Muhammad traces his descent to Ismāʿīl through ʿAdnān, ancestor of the northern Arabs, by way of Ismāʿīl’s eldest son Nābit, the biblical Nebaioth.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> On this reckoning the two sons of Abraham head the two lines that carried prophecy: through Isaac to Moses, David, John and Jesus, and through Ishmael to Muhammad.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_diagram name="family-tree" caption="The family of Abraham, simplified. Dashed lines stand for many generations; the dotted line marks the Mandaeans’ honour for John the Baptist."]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>The tree also places the Mandaeans, on a line of their own beside Shem. They trace their descent from Seth through Enoch to Shem and do not count Abraham among their prophets; the dotted line joins them to John the Baptist, whom they honour as their great teacher.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> See <a href="/journal/who-was-kedar/">Kedar, the Arabs and the prophets</a> for the line of Ishmael in more detail.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="patriarchs-exterior" alt="The stepped approach to the Cave of the Patriarchs in Hebron, where tradition places the tombs of Abraham, Isaac and Jacob" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-traditions-share"} -->
<h2 class="wp-block-heading" id="what-the-traditions-share">What the traditions share</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The four traditions agree on more than they differ. All four worship one God, hold that God has spoken through revealed scripture, and expect a judgement after death.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Judaism, Christianity and Islam also look to Abraham as their forefather and honour Moses and the prophets. Beyond that common ground, pairs of traditions share what the others do not.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Judaism and Christianity share the Hebrew Bible as scripture. Christianity and Islam share Jesus as the Messiah, born of a virgin, who will return.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Judaism and Islam share a God whose oneness admits no division, and a religious law that governs daily life, diet and circumcision.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> Mandaeism joins Christianity and Islam in honouring John the Baptist, and shares baptism with Christianity, though its own baptism is repeated throughout life and always in running water.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_diagram name="shared-beliefs" caption="Shared beliefs of Judaism, Mandaeism, Christianity and Islam, simplified."]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>Islam holds a region of its own with Judaism and another with Christianity, and joins Christianity and Mandaeism in the honour given to John the Baptist. The distinctive claims sit at the edges: for Judaism, Israel as the covenant people and the Talmud; for Mandaeism, repeated baptism in running water and the Ginza Rabba; for Christianity, the Trinity and the crucifixion as atonement; for Islam, Muhammad as the final prophet and the Qur’an.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="zamzam-well" alt="Pilgrims at the old enclosure of the well of Zamzam in Makkah, which Muslim tradition links to Hagar and the infant Ismāʿīl" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>See <a href="/reference/comparisons/">Comparative studies</a> for a fuller comparison.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur’an</a>, <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/the-symbols-of-the-four-traditions/">The symbols of the four traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the family tree</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Genesis 11:10-26; 16:15; 21:2-3. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Genesis 25:13-16; 35:22-26. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Matthew 1:1; Luke 1:5. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><a href="https://quran.com/2/127">Qur'an 2:127</a>, 133, 136; 19:54. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Ibn Isḥāq, <em>The Life of Muhammad</em>, trans. A. Guillaume (London: Oxford University Press, 1955), pp. 3-4. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Maurice Hines, <em>Interpretatio Islamica and the Unraveling of the Ancient Sabian Mysteries</em> (MA thesis, American University in Cairo, 2023), p. 73; E. S. Drower, <em>The Mandaeans of Iraq and Iran</em> (Oxford: Clarendon Press, 1937), pp. 265-266. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Deuteronomy 6:4; Mark 12:29; Qur'an 112:1-4; for Mandaeism, Drower, op. cit., pp. 73, 95. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Qur'an 3:45; 4:157-159; 19:19-21. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Qur'an 4:171; 5:73; Deuteronomy 6:4. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Qur'an 33:40. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-council-of-nicaea', 'photo' => array( 'name' => 'iznik-lake-basilica', 'alt' => 'The Council of Nicaea: the shore of Lake İznik at ancient Nicaea, where the submerged basilica lies' ), 'type' => 'post', 'slug' => 'the-council-of-nicaea', 'title' => 'Nicaea, 325: the council, the creed and the church beneath the lake',
			'excerpt' => 'Archaeologists at Iznik have found the earlier church beneath the lakeside basilica. What the Council of Nicaea decided there, how it ranked the great sees, and how the Qur\'an answered its creed.', 'description' => 'A lost church beneath Lake Iznik, the Council of Nicaea of 325, its creed, and the Qur\'an\'s answer. Read the full account.', 'categories' => array( 'history', 'archaeology', 'theology' ), 'days_ago' => 0, 'since' => 62, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>In July 2026 archaeologists at İznik, the ancient city of Nicaea in north-western Türkiye, reported the remains of an earlier church beneath the basilica on the shore of Lake İznik. The excavation director identifies it as the church in which the bishops of the First Council of Nicaea met in 325, the gathering that fixed the central Christian doctrine about Jesus.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Several outlets have since reported the find, from the region and abroad.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-church-beneath-the-lake">The church beneath the lake</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-church-or-a-palace-hall">A church or a palace hall?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#why-the-council-met">Why the council met</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-was-decided">What was decided</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#nicaea-and-the-five-sees">Nicaea and the five sees</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#earthquake-conquest-and-the-lake">Earthquake, conquest and the lake</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-quranic-answer">The Qur’anic answer</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-church-beneath-the-lake"} -->
<h2 class="wp-block-heading" id="the-church-beneath-the-lake">The church beneath the lake</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The basilica itself came to light in 2014, when an aerial photograph showed the outline of a church under the shallow water near the shore.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Excavation began in 2015 under Professor Mustafa Şahin of Bursa Uludağ University, with permission from the Ministry of Culture and Tourism.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>In the 2026 season the team opened a trench east of the basilica’s prothesis, the room where the sacred vessels were kept, and found its floor paving running on beyond the later walls, together with wall sections and a column base. Şahin identifies these as the Church of Saint Neophytos, destroyed in the earthquake of 368, and the basilica above it as the Church of the Holy Fathers, built after 380 in memory of the bishops of the council. Coins of the emperors Valens and Valentinian from graves before its sanctuary date the later church to about 380.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Researchers from the University of Calabria and the Magna Graecia University of Catanzaro joined the work this season.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The same trench produced a gold ring decorated with a palm tree and a sword, of a type known from the Umayyad and Abbasid periods. Şahin connects it with the Umayyad siege of Nicaea in 729, which failed after six months, though the Umayyad commander is recorded as having entered the Church of the Holy Fathers.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="iznik-walls" alt="The Lefke Gate in the Roman and Byzantine walls of İznik, ancient Nicaea" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-church-or-a-palace-hall"} -->
<h2 class="wp-block-heading" id="a-church-or-a-palace-hall">A church or a palace hall?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Şahin rests his identification partly on Eusebius of Caesarea, a bishop present at the council, who described the meeting place as a small house of worship.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> The same Eusebius, in his account of the council’s formal session, places the assembled bishops in the central hall of the imperial palace, where Constantine entered to address them.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The older Catholic reference literature reconciles the two by holding that the council sat both in the principal church and in the palace hall.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> The new evidence confirms that a smaller and earlier church stood beneath the Church of the Holy Fathers; whether every session of 325 met inside it is a question the written sources leave open. Şahin himself now describes the location of the Church of the Holy Fathers as settled.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"why-the-council-met"} -->
<h2 class="wp-block-heading" id="why-the-council-met">Why the council met</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The dispute began in Alexandria. Arius, a presbyter of that city, taught that the Son of God had a beginning and was created by the Father. His bishop, Alexander, condemned him at a synod of more than a hundred bishops from Egypt and Libya in about 320, but Arius kept his church and his following.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup> Constantine, sole emperor from 324, called a general council to settle the question, chose Nicaea in Bithynia, and put the imperial post at the bishops’ disposal so that they could travel to it.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> The council opened on 19 June 325. Eusebius counted more than 250 bishops; the figure of 318, which became traditional, comes from Hilary of Poitiers.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-was-decided"} -->
<h2 class="wp-block-heading" id="what-was-decided">What was decided</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The council issued a creed. It confessed one God the Father and one Lord Jesus Christ, the Son of God, and added the words that decided the dispute: that the Son is from the substance of the Father, and “begotten not made, consubstantial with the Father.” The Greek word for consubstantial, <em>homoousios</em>, meaning of one substance, entered Christian doctrine at Nicaea.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The creed closed with anathemas against anyone who said that there was once a time when the Son did not exist, that he came from nothing, or that he was of another substance than the Father.<sup class="abr-fn"><a href="#note-13" id="ref-13-2">13</a></sup> The council’s letter to the church of Alexandria reports that Arius and two Egyptian bishops who refused to sign shared his condemnation.<sup class="abr-fn"><a href="#note-13" id="ref-13-3">13</a></sup> Beyond the creed, the council settled that Easter should be kept on the same day throughout the church, and issued twenty canons on church order.<sup class="abr-fn"><a href="#note-13" id="ref-13-4">13</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="nicaea-hagia-sophia" alt="The church of Hagia Sophia in İznik, where the Second Council of Nicaea met in 787" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"nicaea-and-the-five-sees"} -->
<h2 class="wp-block-heading" id="nicaea-and-the-five-sees">Nicaea and the five sees</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Two of those canons began the ranking of the great churches. The sixth confirmed the long-standing authority of the bishop of Alexandria over Egypt, Libya and Pentapolis, likening it to that of the bishop of Rome, and preserved the privileges of Antioch; the seventh gave special honour to the bishop of Aelia, the Roman name for Jerusalem.<sup class="abr-fn"><a href="#note-13" id="ref-13-5">13</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Constantinople, founded as the new imperial capital in 330, was placed second after Rome by the Council of Constantinople in 381 and again at Chalcedon in 451.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> The emperor Justinian gave the arrangement its classic form in his legislation in the sixth century, and the Council in Trullo in 692 ranked the five patriarchal sees as Rome, Constantinople, Alexandria, Antioch and Jerusalem, the order later called the pentarchy. Nicaea itself was never one of the five: it is the city where their ranking began.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The pentarchy did not last long in practice. In the seventh century, within a century of Justinian, Alexandria, Antioch and Jerusalem came under Muslim rule, and the patriarch of Constantinople was left as the only effective head of Eastern Christianity.<sup class="abr-fn"><a href="#note-15" id="ref-15-2">15</a></sup> In 2025 Pope Leo XIV came to İznik for the 1,700th anniversary of the council.<sup class="abr-fn"><a href="#note-16" id="ref-16">16</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"earthquake-conquest-and-the-lake"} -->
<h2 class="wp-block-heading" id="earthquake-conquest-and-the-lake">Earthquake, conquest and the lake</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The earthquake of 368 that destroyed the Church of Saint Neophytos was not the last to strike Nicaea. Another, in 740, brought down the Church of the Holy Fathers, and its ruins sank into the lake, where they lay forgotten for more than a thousand years.<sup class="abr-fn"><a href="#note-17" id="ref-17">17</a></sup> An earthquake in the eleventh century damaged the Hagia Sophia in which the Second Council of Nicaea had met in 787, and the church of the Dormition, the Koimesis, was destroyed in 1065.<sup class="abr-fn"><a href="#note-18" id="ref-18">18</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Conquest followed. The Seljuks took Nicaea in 1081, made it their capital and gave it the name İznik; the Byzantines recovered it in 1097. After the crusaders seized Constantinople in 1204, Nicaea became the heart of the Byzantine successor state, the Empire of Nicaea, with a palace for the patriarch, until Constantinople was retaken in 1261.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>In 1331 the Ottomans took the city and made it for a short time their capital. They converted its Hagia Sophia into the Orhan Mosque and built there some of the earliest Ottoman mosques, madrasas and soup kitchens, and in the sixteenth and seventeenth centuries İznik tiles decorated mosques and palaces throughout the empire. The city suffered again during the Turkish War of Independence, when the Koimesis church was badly damaged.<sup class="abr-fn"><a href="#note-19" id="ref-19">19</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The lake has since given back what the earthquake took. When the basilica was found in 2014 it lay about fifty metres offshore under two metres of water; the lake began to retreat in 2020, and by 2025 the whole building stood on dry land.<sup class="abr-fn"><a href="#note-20" id="ref-20">20</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-quranic-answer"} -->
<h2 class="wp-block-heading" id="the-quranic-answer">The Qur’anic answer</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Three centuries after Nicaea declared the Son of one substance with the Father, the Qur’an addressed the claim at its root. In the chapter named for Mary it rejects the idea that God has <em>walad</em> (<span lang="ar" dir="rtl">وَلَد</span>, offspring) in terms of cosmic gravity:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَقَالُوا۟ ٱتَّخَذَ ٱلرَّحْمَـٰنُ وَلَدًا ٨٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">They say, “The Most Compassionate has offspring.”</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">لَّقَدْ جِئْتُمْ شَيْـًٔا إِدًّا ٨٩</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">You have certainly made an outrageous claim,</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">تَكَادُ ٱلسَّمَـٰوَٰتُ يَتَفَطَّرْنَ مِنْهُ وَتَنشَقُّ ٱلْأَرْضُ وَتَخِرُّ ٱلْجِبَالُ هَدًّا ٩٠</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">by which the heavens are about to burst, the earth to split apart, and the mountains to crumble to pieces</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">أَن دَعَوْا۟ لِلرَّحْمَـٰنِ وَلَدًا ٩١</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">in protest of attributing children to the Most Compassionate.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 19:88-91<sup class="abr-fn"><a href="#note-21" id="ref-21">21</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The history of Nicaea gives that language an earthly echo. The verses speak of the earth about to split apart and the mountains about to crumble at the claim; the ground beneath the city where the claim was first written into a creed split again and again. The earthquake of 368 destroyed the church in which the council is believed to have met, and the earthquake of 740 brought down the church raised over it in the bishops’ memory and sent its ruins beneath the lake. The Hagia Sophia in which the second council of Nicaea met in 787 became, under Orhan, a mosque, and serves as one today.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Qur’an names no city, and a historian cannot read the earthquakes of Bithynia as a verdict. A reader who sets the verses beside the history of Nicaea will still notice the correspondence: the doctrine the verses reject was defined in a city whose earth split, whose church fell and sank, and whose great church now serves the worship of the one God.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Elsewhere the Qur’an calls Jesus the Messiah, a messenger of God and His word conveyed to Mary, and tells Christians not to say “three”; its short chapter on God’s oneness states that He neither begets nor was begotten.<sup class="abr-fn"><a href="#note-22" id="ref-22">22</a></sup> The council at Nicaea and the Qur’an thus answer the same question about Jesus, and answer it in opposite ways: the one by declaring him of the same substance as God, the other by declaring that God has no offspring at all. See <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a> and <a href="/religions/christianity/">Christianity</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/paul-and-peter-two-missions/">Paul and Peter: two missions in the early church</a>, <a href="/journal/abrahamic-family-tree/">The Abrahamic family tree and what the traditions share</a>, <a href="/journal/the-five-great-sees/">The five great sees of the early church</a>, <a href="/journal/hagia-sophia/">Hagia Sophia: cathedral, mosque, museum and mosque again</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the Council of Nicaea</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">“Lost Church of First Council of Nicaea emerges beneath Iznik Basilica,” <em>Türkiye Today</em>, 10 July 2026. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">“Archaeologists find possible remains of Church that hosted the First Council of Nicaea,” <em>HeritageDaily</em>, 10 July 2026; “Archaeologists unearth secret church tied to Council of Nicaea,” Fox News Digital, 10 August 2026. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">“Early Christian Church That May Have Hosted First Council of Nicaea Found in Turkey,” <em>Greek Reporter</em>, 11 August 2026. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><em>Türkiye Today</em>, op. cit., reporting Mustafa Şahin to Anadolu Agency. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5"><em>HeritageDaily</em>, op. cit. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6"><em>Türkiye Today</em>, op. cit. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibid., quoting Şahin. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Eusebius of Caesarea, <em>Life of Constantine</em> 3.10, trans. E. C. Richardson, Nicene and Post-Nicene Fathers, second series, vol. 1 (New York, 1890). <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">“First Council of Nicaea,” <em>The Catholic Encyclopedia</em>, vol. 11 (New York: Robert Appleton Company, 1911). <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Fox News Digital, op. cit., quoting Şahin to Anadolu Agency. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11"><em>The Catholic Encyclopedia</em>, op. cit. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">Eusebius, op. cit., 3.6. <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Norman P. Tanner, ed., <em>Decrees of the Ecumenical Councils</em>, vol. 1 (London: Sheed &amp; Ward, 1990), First Council of Nicaea: introduction, profession of faith, canons 6-7 and the synodal letter to the Egyptians, as reproduced by Papal Encyclicals Online. <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">“The Pentarchy and the Moscow Patriarchate,” OrthoChristian.com, on canon 3 of Constantinople I and canon 28 of Chalcedon. <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-15">“Pentarchy,” <em>Encyclopaedia Britannica</em>. <a href="#ref-15" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-16"><em>Türkiye Today</em>, op. cit. <a href="#ref-16" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-17">“Pope Leo XIV’s visit rekindles debate: Did First Council of Nicaea meet at Sunken Basilica?,” <em>Türkiye Today</em>, 29 January 2026; UNESCO World Heritage Centre, “İznik,” Tentative List entry 5900 (submitted 2014). <a href="#ref-17" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-18">UNESCO, op. cit. <a href="#ref-18" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-19">Ibid. <a href="#ref-19" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-20">“Ancient Roman Basilica Emerges From Lake in Turkey After 700 Years Underwater,” <em>Greek Reporter</em>, 25 November 2025, quoting Mustafa Şahin. <a href="#ref-20" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-21"><a href="https://quran.com/19/88">Qur'an 19:88</a>-91, trans. Mustafa Khattab, <em>The Clear Quran</em>. <a href="#ref-21" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-22">Qur'an 4:171; 112:1-4. <a href="#ref-22" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-five-great-sees', 'photo' => array( 'name' => 'place-istanbul', 'alt' => 'The great sees: hagia Sophia in Istanbul, once the cathedral of the patriarch of Constantinople' ), 'type' => 'post', 'slug' => 'the-five-great-sees', 'title' => 'The five great sees of the early church',
			'excerpt' => 'How Rome, Constantinople, Alexandria, Antioch and Jerusalem came to head the church of the Roman empire, and what became of the arrangement after the seventh century.', 'description' => 'The great sees of the early church: Rome, Constantinople, Alexandria, Antioch and Jerusalem. Read their history.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 63, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The great sees of the early church were five: Rome, Constantinople, Alexandria, Antioch and Jerusalem. By the sixth century five cities stood at the head of the Christian church in the Roman empire: Rome, Constantinople, Alexandria, Antioch and Jerusalem. Later historians call the arrangement the pentarchy, the rule of five. It grew over three centuries, from the councils of the church and the laws of the emperors, and it ended in practice within a century of taking its final shape.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#how-the-ranking-began">How the ranking began</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-five-sees">The five sees</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#after-the-seventh-century">After the seventh century</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"how-the-ranking-began"} -->
<h2 class="wp-block-heading" id="how-the-ranking-began">How the ranking began</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The first step came at the Council of Nicaea in 325. Its sixth canon confirmed the ancient authority of the bishop of Alexandria over Egypt, Libya and Pentapolis, on the ground that the bishop of Rome held a similar authority, and preserved the privileges of the church of Antioch; its seventh granted special honour to the bishop of Aelia, the Roman name for Jerusalem.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Nicaea itself was never one of the great sees. It is the place where their ranking was first written down; see <a href="/journal/the-council-of-nicaea/">Nicaea, 325</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Constantinople, the new imperial capital, entered the order later. The Council of Constantinople in 381 placed its bishop second in honour after the bishop of Rome, and the Council of Chalcedon in 451 confirmed and extended that position.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The emperor Justinian gave the five sees their classic form in his legislation, above all in his Novel 131, and the Council in Trullo in 692 ranked them as Rome, Constantinople, Alexandria, Antioch and Jerusalem.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The order rested on more than one principle, and the principles did not always agree. The great sees owed much of their standing to the political and economic weight of their cities; Constantinople ranked second because it was the capital. The bishops of Rome held instead that only churches founded by apostles could claim primacy, a view that set them against the rise of Constantinople.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-five-sees"} -->
<h2 class="wp-block-heading" id="the-five-sees">The five sees</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>Rome</strong>, the old capital, claimed the first place as the church of the apostles Peter and Paul, and its bishops argued for that primacy on apostolic grounds.<sup class="abr-fn"><a href="#note-4" id="ref-4-2">4</a></sup> St Peter’s Basilica in Vatican City stands over the traditional site of Peter’s tomb.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Constantinople</strong>, the “New Rome” on the Bosporus, was the seat of the emperor and so of the second patriarch. Its great church, Hagia Sophia, was completed under Justinian in 537 and served as the patriarch’s cathedral until the Ottoman conquest of 1453, when it became a mosque. It was a museum from 1934 and has been a mosque again since 2020.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-alexandria" alt="The Citadel of Qaitbay in Alexandria, built on the site of the ancient lighthouse" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Alexandria</strong> traced its church to Mark, who, as Eusebius reports the tradition, was the first sent to Egypt and first established churches in the city.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> In the early fourth century it was the city of Arius, whose teaching about the Son led to the Council of Nicaea, and of the young deacon Athanasius, who became its chief opponent.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Antioch</strong> was where the followers of Jesus were first called Christians,<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> and where Paul confronted Peter over the table fellowship of Jewish and Gentile believers; see <a href="/journal/paul-and-peter-two-missions/">Paul and Peter: two missions in the early church</a>.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-antioch" alt="The rock-cut Church of St Peter on the edge of Antakya, ancient Antioch" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Jerusalem</strong>, the city of the crucifixion and of the first church, held the fifth place. At Nicaea it was still a suffragan of Caesarea, and its bishop was granted honour “saving the dignity proper to the metropolitan”; only later did it take its place among the five.<sup class="abr-fn"><a href="#note-1" id="ref-1-2">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"after-the-seventh-century"} -->
<h2 class="wp-block-heading" id="after-the-seventh-century">After the seventh century</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The arrangement assumed a single Christian empire, and that empire did not last in the East. In the seventh century Alexandria, Antioch and Jerusalem came under Muslim rule, and the pentarchy lost its practical force: the patriarch of Constantinople remained the only effective head of Eastern Christianity, and new churches in Bulgaria, Serbia and Russia in time acquired their own patriarchs.<sup class="abr-fn"><a href="#note-3" id="ref-3-2">3</a></sup> The three eastern sees did not disappear. Their patriarchs lived on under Muslim government, and all three still have patriarchs today, alongside the pope in Rome and the ecumenical patriarch in Istanbul.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-council-of-nicaea/">Nicaea, 325: the council, the creed and the church beneath the lake</a>, <a href="/journal/paul-and-peter-two-missions/">Paul and Peter: two missions in the early church</a>, <a href="/religions/christianity/">Christianity</a>, <a href="/journal/hagia-sophia/">Hagia Sophia: cathedral, mosque, museum and mosque again</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the great sees</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Norman P. Tanner, ed., <em>Decrees of the Ecumenical Councils</em>, vol. 1 (London: Sheed &amp; Ward, 1990), First Council of Nicaea, canons 6-7, as reproduced by Papal Encyclicals Online. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">“The Pentarchy and the Moscow Patriarchate,” OrthoChristian.com, on canon 3 of Constantinople I and canon 28 of Chalcedon. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">“Pentarchy,” <em>Encyclopaedia Britannica</em>. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ibid. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Nathan Morley, “Turkey: Hagia Sophia Basilica to become mosque,” <em>Vatican News</em>, 10 July 2020. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Eusebius, <em>Church History</em> 2.16.1, trans. A. C. McGiffert, Nicene and Post-Nicene Fathers, second series, vol. 1 (New York, 1890). <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">“First Council of Nicaea,” <em>The Catholic Encyclopedia</em>, vol. 11 (New York: Robert Appleton Company, 1911). <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8"><a href="https://www.biblegateway.com/passage/?search=Acts+11:26&amp;version=NRSVUE">Acts 11:26</a>. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Galatians 2:11-14. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:hagia-sophia', 'photo' => array( 'name' => 'hagia-sophia-exterior', 'alt' => 'Hagia Sophia in Istanbul seen across the fountain of Sultanahmet Square' ), 'type' => 'post', 'slug' => 'hagia-sophia', 'title' => 'Hagia Sophia: cathedral, mosque, museum and mosque again',
			'excerpt' => 'Cathedral for nine centuries, the first mosque of the Ottoman state, a museum, and a mosque again: the history of Hagia Sophia and the verse of Light inscribed in its dome.', 'description' => 'Hagia Sophia from Justinian\'s cathedral to Ottoman mosque, museum and mosque again, and the verse in its dome. Read on.', 'categories' => array( 'history', 'culture' ), 'days_ago' => 0, 'since' => 66, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Few buildings have served so many faiths and governments. For more than nine centuries Hagia Sophia, the church of Holy Wisdom in Constantinople, was the cathedral of the Eastern Roman empire; for nearly five it was the foremost mosque of the Ottoman state; for eighty-six years it was a museum; and since 2020 it has been a mosque again.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#three-churches-on-one-site">Three churches on one site</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-cathedral-of-the-east">The cathedral of the East</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-imperial-mosque">The imperial mosque</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#museum-and-mosque-again">Museum and mosque again</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-verse-in-the-dome">The verse in the dome</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"three-churches-on-one-site"} -->
<h2 class="wp-block-heading" id="three-churches-on-one-site">Three churches on one site</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The present building is the third on its site. The first, dedicated in 360 by the emperor Constantius, was destroyed in riots in 404; the second, dedicated by Theodosius II in 415, burned in the Nika revolt of 532, which laid waste much of the city. Justinian ordered the church rebuilt at once, and the new building, designed by Anthemius of Tralles and Isidore of Miletus, was inaugurated on 27 December 537. Its dome, more than thirty-one metres across, collapsed in 558 after a series of earthquakes and was rebuilt in 562 to a greater height; the structure that stands today is essentially the one raised between 532 and 537.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Procopius, the historian of Justinian’s reign, left the description that later writers repeated for centuries. The dome, he wrote, seemed to hang from heaven on a golden chain, with no solid masonry beneath it.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-cathedral-of-the-east"} -->
<h2 class="wp-block-heading" id="the-cathedral-of-the-east">The cathedral of the East</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>As the cathedral of the patriarch of Constantinople, Hagia Sophia witnessed the great quarrels of Eastern Christianity. On 16 July 1054 the papal legate Cardinal Humbert laid a bull excommunicating the patriarch Michael Cerularius on its altar, in full view of the congregation; the patriarch replied by excommunicating the legates.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Later tradition made that scene the start of the schism between the Latin and Greek churches, a view that historians of the period no longer hold: the break was gradual, and no single event caused it.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The decisive wound came from fellow Christians. In April 1204 the Fourth Crusade, diverted from its march on Egypt, stormed Constantinople and sacked it. The Byzantine historian Niketas Choniates, an eyewitness, recorded that the altar of the Great Church was broken into pieces and divided among the soldiers.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> A Latin, Thomas Morosini, was installed as patriarch, and Hagia Sophia served the Latin church until the Byzantines retook the city in 1261.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="hagia-sophia-1852" alt="Hagia Sophia with its four minarets, in a lithograph of 1852 by Louis Haghe after Gaspare Fossati" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-imperial-mosque"} -->
<h2 class="wp-block-heading" id="the-imperial-mosque">The imperial mosque</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>After the Ottoman conquest of Constantinople in 1453, Mehmed II converted Hagia Sophia into a mosque.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Minarets rose around it, its figural mosaics were covered, and buttresses were added to strengthen its walls. The building became the personal property of the sultan, so that no change could be made to it without his consent; that protection is one reason its mosaics survived beneath their plaster.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Between 1847 and 1849 Sultan Abdülmecid had the building restored by the Swiss-Italian architects Gaspare and Giuseppe Fossati, whose teams reinforced the dome, cleaned the mosaics and renewed the mihrab and the minbar. During that restoration the calligrapher Kazasker Mustafa İzzet Efendi wrote the eight great roundels, seven and a half metres across, that still hang in the prayer hall, bearing in gold the names of God, the Prophet Muhammad, the four rightly guided caliphs and the Prophet’s grandsons Hasan and Husayn.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> In the crown of the dome he inscribed a verse from the chapter of Light.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="hagia-sophia-interior" alt="The dome of Hagia Sophia seen from below, with the verse of Light inscribed at its crown" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"museum-and-mosque-again"} -->
<h2 class="wp-block-heading" id="museum-and-mosque-again">Museum and mosque again</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In 1934 the government of the new Turkish Republic under Mustafa Kemal Atatürk made Hagia Sophia a museum.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup> It became part of the UNESCO World Heritage site of the Historic Areas of İstanbul in 1985.<sup class="abr-fn"><a href="#note-9" id="ref-9-2">9</a></sup> In July 2020 Türkiye’s Council of State annulled the decree of 1934, and a presidential decree returned the building to use as a mosque, with prayers from 24 July.<sup class="abr-fn"><a href="#note-7" id="ref-7-2">7</a></sup> Ecumenical Patriarch Bartholomew protested that Hagia Sophia “belongs not only to those who own it at the moment, but to all humanity.”<sup class="abr-fn"><a href="#note-7" id="ref-7-3">7</a></sup> It remains open to visitors outside the times of prayer.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-verse-in-the-dome"} -->
<h2 class="wp-block-heading" id="the-verse-in-the-dome">The verse in the dome</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The verse inscribed at the summit of the dome is the verse of Light:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">ٱللَّهُ نُورُ ٱلسَّمَـٰوَٰتِ وَٱلْأَرْضِ ۚ مَثَلُ نُورِهِۦ كَمِشْكَوٰةٍ فِيهَا مِصْبَاحٌ ۖ ٱلْمِصْبَاحُ فِى زُجَاجَةٍ ۖ ٱلزُّجَاجَةُ كَأَنَّهَا كَوْكَبٌ دُرِّىٌّ يُوقَدُ مِن شَجَرَةٍ مُّبَـٰرَكَةٍ زَيْتُونَةٍ لَّا شَرْقِيَّةٍ وَلَا غَرْبِيَّةٍ يَكَادُ زَيْتُهَا يُضِىٓءُ وَلَوْ لَمْ تَمْسَسْهُ نَارٌ ۚ نُّورٌ عَلَىٰ نُورٍ ۗ يَهْدِى ٱللَّهُ لِنُورِهِۦ مَن يَشَآءُ ۚ وَيَضْرِبُ ٱللَّهُ ٱلْأَمْثَـٰلَ لِلنَّاسِ ۗ وَٱللَّهُ بِكُلِّ شَىْءٍ عَلِيمٌ ٣٥</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Allah is the Light of the heavens and the earth. His light is like a niche in which there is a lamp, the lamp is in a crystal, the crystal is like a shining star, lit from ˹the oil of˺ a blessed olive tree, ˹located˺ neither to the east nor the west, whose oil would almost glow, even without being touched by fire. Light upon light! Allah guides whoever He wills to His light. And Allah sets forth parables for humanity. For Allah has ˹perfect˺ knowledge of all things.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 24:35<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>Procopius believed that the dome hung from heaven; the builders ringed its base with windows so that light seemed to hold it up. Since the nineteenth century the dome itself has named the source of that light.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The verse that follows it in the Qur’an speaks of houses which God has ordered to be raised and in which His name is mentioned, glorified there morning and evening,<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup> and another verse declares that the <em>masājid</em> (<span lang="ar" dir="rtl">ٱلْمَسَـٰجِد</span>, the places of prostration) belong to God, so that none is to be invoked beside Him.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> A building raised to glorify Holy Wisdom under a creed that made Christ one of three has for most of its later history been such a house: the name of the one God is proclaimed beneath a dome that bears His verse of Light.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The history also shows how much the building owes to its Muslim custodians. The crusaders who shared its altar among themselves as plunder were Christians; the sultans who received it in 1453 kept its structure standing, restored it, and preserved the mosaics of its former faith as their own property.<sup class="abr-fn"><a href="#note-5" id="ref-5-2">5</a></sup><sup class="abr-fn"><a href="#note-8" id="ref-8-2">8</a></sup> See <a href="/journal/the-five-great-sees/">The five great sees of the early church</a> and <a href="/journal/the-council-of-nicaea/">Nicaea, 325</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-five-great-sees/">The five great sees of the early church</a>, <a href="/journal/the-council-of-nicaea/">Nicaea, 325: the council, the creed and the church beneath the lake</a>, <a href="/religions/islam/">Islam</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Hagia Sophia</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">“Hagia Sophia,” Historic Civil Engineering Landmarks, American Society of Civil Engineers. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Procopius, <em>Buildings</em> 1.1.46, in the translation reproduced by the Department of Art History and Archaeology, Columbia University. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">“Saint Leo IX,” <em>Encyclopaedia Britannica</em>. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">“1054 The East-West Schism,” <em>Christian History Magazine</em>, Christian History Institute. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Niketas Choniates, <em>The Sack of Constantinople (1204)</em>, Internet Medieval Sourcebook, Fordham University. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">“The Fourth Crusade,” <em>The Orthodox Faith</em>, vol. 3, Orthodox Church in America. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Nathan Morley, “Turkey: Hagia Sophia Basilica to become mosque,” <em>Vatican News</em>, 10 July 2020. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">“Hagia Sophia Throughout History: One Dome, Three Religions,” <em>TheCollector</em>, 26 July 2022. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">“Hagia Sophia / Ayasofya,” Museums of Türkiye (muze.gen.tr), Ministry of Culture and Tourism. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">“Hagia Sophia, Mosque of Sultans,” <em>Skylife</em>, August 2013; “Hagia Sophia Istanbul Interior,” TheHagiaSophia.com, 12 June 2025, identifying the verse as <a href="https://quran.com/24/35">Qur’an 24:35</a>. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">“Hagia Sophia, Istanbul,” Smarthistory. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">Qur'an 24:35, trans. Mustafa Khattab, <em>The Clear Quran</em>; Arabic text from Quran.com. <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Qur'an 24:36, trans. Saheeh International. <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">Qur'an 72:18, trans. Saheeh International. <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-stations-of-the-hajj', 'photo' => array( 'name' => 'hajj-arafat', 'alt' => 'The Hajj: pilgrims filling the plain of ʿArafāt beside the sign that marks its boundary' ), 'type' => 'post', 'slug' => 'the-stations-of-the-hajj', 'title' => 'The stations of the Hajj: Minā, ʿArafāt and Muzdalifah',
			'excerpt' => 'From Makkah to Minā, ʿArafāt and Muzdalifah and back: the stations of the Hajj, day by day, and the call to Abraham that every one of them answers.', 'description' => 'Mina, Arafat and Muzdalifah: the stations of the Hajj and the Abrahamic story behind each rite. Walk through them here.', 'categories' => array( 'religion', 'scripture' ), 'days_ago' => 0, 'since' => 67, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Each year the Hajj carries its pilgrims out of Makkah to three stations in the valleys to the east: Minā, ʿArafāt and Muzdalifah. In 2026 the Saudi General Authority for Statistics counted 1,707,301 pilgrims, of whom 1,546,655 came from abroad: 1,485,729 by air, 54,429 by road and 6,497 by sea.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The Hajj is the fifth pillar of Islam, a duty on every adult Muslim able to make it once in a lifetime, and its rites fall in the first half of Dhū al-Ḥijjah, the last month of the Islamic year.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#abrahams-call">Abraham’s call</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#makkah-the-house-and-the-two-hills">Makkah: the House and the two hills</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mina-the-eighth-day">Minā: the eighth day</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#arafat-the-ninth-day">ʿArafāt: the ninth day</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#muzdalifah-the-night">Muzdalifah: the night</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mina-again-the-days-of-sacrifice">Minā again: the days of sacrifice</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-promise-kept">The promise kept</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"abrahams-call"} -->
<h2 class="wp-block-heading" id="abrahams-call">Abraham’s call</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an traces the pilgrimage to Abraham. God showed him the site of the House, forbade him to set any partner beside Him, and commanded him to call the people to it:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَإِذْ بَوَّأْنَا لِإِبْرَٰهِيمَ مَكَانَ ٱلْبَيْتِ أَن لَّا تُشْرِكْ بِى شَيْـًٔا وَطَهِّرْ بَيْتِىَ لِلطَّآئِفِينَ وَٱلْقَآئِمِينَ وَٱلرُّكَّعِ ٱلسُّجُودِ ٢٦</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And [mention, O Muḥammad], when We designated for Abraham the site of the House, [saying], “Do not associate anything with Me and purify My House for those who perform ṭawāf and those who stand [in prayer] and those who bow and prostrate.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَأَذِّن فِى ٱلنَّاسِ بِٱلْحَجِّ يَأْتُوكَ رِجَالًا وَعَلَىٰ كُلِّ ضَامِرٍ يَأْتِينَ مِن كُلِّ فَجٍّ عَمِيقٍ ٢٧</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And proclaim to the people the ḥajj [pilgrimage]; they will come to you on foot and on every lean camel; they will come from every distant pass.”</p>
<!-- /wp:paragraph -->
<cite>Qur’an 22:26-27<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>Every station of the Hajj answers that command. The figures of 2026 read like a commentary on its last line: the pilgrims came by air and by road and by sea, from every distant pass of the modern world, to the valley where Abraham was told to call them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"makkah-the-house-and-the-two-hills"} -->
<h2 class="wp-block-heading" id="makkah-the-house-and-the-two-hills">Makkah: the House and the two hills</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The pilgrim enters Makkah in <em>iḥrām</em> (<span lang="ar" dir="rtl">إِحْرَام</span>, the consecrated state and its two plain white garments), walks seven times around the Kaaba in the <em>ṭawāf</em> (<span lang="ar" dir="rtl">طَوَاف</span>, circling), prays toward the Station of Abraham, and walks seven times between the hills of Ṣafā and Marwah.<sup class="abr-fn"><a href="#note-2" id="ref-2-2">2</a></sup> That walk, the <em>saʿy</em> (<span lang="ar" dir="rtl">سَعْي</span>, striving), keeps the memory of Hagar. Left with the infant Ishmael in a valley without water, she climbed Ṣafā to look for help, crossed the valley to Marwah, and did so seven times; the Prophet said that this was the origin of the pilgrims’ walking between the two hills.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Qur’an names Ṣafā and Marwah among the symbols of God.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mina-the-eighth-day"} -->
<h2 class="wp-block-heading" id="mina-the-eighth-day">Minā: the eighth day</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>On the eighth of Dhū al-Ḥijjah, the Day of Tarwiyah, the pilgrims leave Makkah for Minā and spend the day and night there.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Minā is a valley of tents, laid out in rows that fill it from side to side, and it is where the pilgrims will return for the last days of the Hajj.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="hajj-mina" alt="The tent city of Minā lit at night during the Hajj" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"arafat-the-ninth-day"} -->
<h2 class="wp-block-heading" id="arafat-the-ninth-day">ʿArafāt: the ninth day</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>On the ninth the pilgrims move to the plain of ʿArafāt and the low hill within it, Jabal al-Raḥmah, the Mount of Mercy.<sup class="abr-fn"><a href="#note-2" id="ref-2-3">2</a></sup> The standing there, the <em>wuqūf</em> (<span lang="ar" dir="rtl">وُقُوف</span>, standing), from the day into the sunset, is the central pillar of the Hajj.<sup class="abr-fn"><a href="#note-6" id="ref-6-2">6</a></sup> When a group from Najd asked the Prophet at ʿArafāt how the Hajj was done, he had a man proclaim the answer aloud: the Hajj is on the day of ʿArafah.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> A pilgrim who misses it has missed the Hajj, and signs at the edge of the plain mark where ʿArafāt ends.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"muzdalifah-the-night"} -->
<h2 class="wp-block-heading" id="muzdalifah-the-night">Muzdalifah: the night</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>At sunset the pilgrims leave ʿArafāt for Muzdalifah, the open ground between ʿArafāt and Minā. There they pray the sunset and night prayers together and sleep in the open until dawn.<sup class="abr-fn"><a href="#note-6" id="ref-6-3">6</a></sup> The Qur’an names this station: when you depart from ʿArafāt, remember God at <em>al-Mashʿar al-Ḥarām</em> (<span lang="ar" dir="rtl">ٱلْمَشْعَر ٱلْحَرَام</span>, the Sacred Monument).<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> At Muzdalifah many gather the small pebbles they will need in Minā.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="hajj-muzdalifah" alt="Pilgrims sleeping in the open at Muzdalifah on the night after ʿArafāt" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mina-again-the-days-of-sacrifice"} -->
<h2 class="wp-block-heading" id="mina-again-the-days-of-sacrifice">Minā again: the days of sacrifice</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The tenth is the Day of Sacrifice.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The pilgrims throw seven pebbles at the largest of three pillars, Jamrat al-ʿAqabah, in the <em>ramy</em> (<span lang="ar" dir="rtl">رَمْي</span>, casting), a rite that stands for the rejection of the Devil; they sacrifice an animal in commemoration of Abraham’s sacrifice; men shave their heads and women cut a lock of hair; and they return to Makkah for the circling of the House.<sup class="abr-fn"><a href="#note-2" id="ref-2-4">2</a></sup> The Qur’an closes the story of that sacrifice with God ransoming Abraham’s son with a great sacrifice.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> On the three days that follow, the Days of Tashrīq, the pilgrims stay in Minā and stone all three pillars each day.<sup class="abr-fn"><a href="#note-6" id="ref-6-4">6</a></sup> A last circling of the Kaaba, the farewell <em>ṭawāf</em>, ends the Hajj.<sup class="abr-fn"><a href="#note-2" id="ref-2-5">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="hajj-arafat-tile" alt="An Ottoman İznik tile panel depicting the pilgrims’ camp at ʿArafāt, in the Topkapı Palace, Istanbul" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-promise-kept"} -->
<h2 class="wp-block-heading" id="the-promise-kept">The promise kept</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Read in order, the stations retrace a single family’s trial and a single command. Hagar’s search for water becomes the walk between the two hills, and Abraham’s readiness to give up his son becomes the sacrifice at Minā, where the casting of the stones repeats his rejection of the Devil. Above them stands the call of Qur’an 22:27, spoken to Abraham at the empty site of the House. The pilgrims who stood on ʿArafāt in 2026 had come on foot and by road, by sea and by air, from every distant pass, as the verse promised they would. See <a href="/journal/abrahamic-family-tree/">The Abrahamic family tree</a> for the family behind the rites, and <a href="/journal/who-was-abraham/">Who was Abraham?</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur’an</a>, <a href="/journal/abrahamic-family-tree/">The Abrahamic family tree and what the traditions share</a>, <a href="/journal/hira-and-quba/">Ḥirāʾ and Qubāʾ</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the Hajj</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">General Authority for Statistics (GASTAT), “Total number of pilgrims for Hajj 2026 reaches (1,707,301),” news release, 2026. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">“Hajj,” <em>Encyclopaedia Britannica</em>. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3"><a href="https://quran.com/22/26">Qur'an 22:26</a>-27, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ṣaḥīḥ al-Bukhārī 3364, narrated by Ibn ʿAbbās. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur'an 2:158. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">“Hajj,” <em>Saudipedia</em>. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Sunan Abī Dāwūd 1949, narrated by ʿAbd al-Raḥmān ibn Yaʿmar al-Dīlī, graded ṣaḥīḥ by al-Albānī; cf. Jāmiʿ al-Tirmidhī 2975. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Qur'an 2:198, trans. Saheeh International. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Qur'an 37:107. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:hira-and-quba', 'photo' => array( 'name' => 'jabal-al-nour-peak', 'alt' => 'Jabal al-Nūr, the Mountain of Light, above Makkah, where the cave of Ḥirāʾ lies' ), 'type' => 'post', 'slug' => 'hira-and-quba', 'title' => 'Ḥirāʾ and Qubāʾ: where the revelation and the first mosque began',
			'excerpt' => 'Where the revelation began and where the first mosque was built: the cave of Ḥirāʾ above Makkah and the mosque of Qubāʾ at Madinah, read through the verses tied to each.', 'description' => 'The cave of Hira where the Qur\'an began and Quba, the first mosque of Islam, with the verses tied to each. Read the story.', 'categories' => array( 'history', 'scripture' ), 'days_ago' => 0, 'since' => 68, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Two places mark the beginnings of Islam. On a mountain above Makkah is the cave of Ḥirāʾ, where the revelation of the Qur’an began; in Qubāʾ, on the southern edge of Madinah, stands the mosque that the Prophet founded when he reached the city at the Hijra in 622. The first is where the message was received, and the second is where the community first gathered to pray.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-cave-on-the-mountain-of-light">The cave on the Mountain of Light</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-first-mosque">The first mosque</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-mosque-today">The mosque today</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#from-the-cave-to-the-mosque">From the cave to the mosque</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-cave-on-the-mountain-of-light"} -->
<h2 class="wp-block-heading" id="the-cave-on-the-mountain-of-light">The cave on the Mountain of Light</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The cave lies near the summit of Jabal al-Nūr (<span lang="ar" dir="rtl">جَبَل ٱلنُّور</span>, the Mountain of Light), a steep peak on the edge of Makkah. ʿĀʾishah described how the revelation came. Before it, the Prophet loved seclusion; he would go to the cave of Ḥirāʾ with provisions and worship there for many days before returning to Khadījah for more. There the angel came to him and told him to read. He answered that he could not read; three times the angel pressed him and repeated the command, and then recited the first verses of the chapter called the Clot.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">ٱقْرَأْ بِٱسْمِ رَبِّكَ ٱلَّذِى خَلَقَ ١</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Recite in the name of your Lord who created,</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">خَلَقَ ٱلْإِنسَـٰنَ مِنْ عَلَقٍ ٢</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Created man from a clinging substance.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">ٱقْرَأْ وَرَبُّكَ ٱلْأَكْرَمُ ٣</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Recite, and your Lord is the most Generous,</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">ٱلَّذِى عَلَّمَ بِٱلْقَلَمِ ٤</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Who taught by the pen,</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">عَلَّمَ ٱلْإِنسَـٰنَ مَا لَمْ يَعْلَمْ ٥</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Taught man that which he knew not.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 96:1-5<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The first word of the revelation was a command to recite, and its first verses speak of the pen and of teaching man what he did not know. The religion that began in the cave began as a spoken and written word, given to a man who could not read. Pilgrims still climb the mountain to the cave, where the rocks around the entrance are painted with Qur’anic calligraphy.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="hira-cave" alt="Pilgrims at the entrance to the cave of Ḥirāʾ, its rocks painted with Qur’anic calligraphy" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-first-mosque"} -->
<h2 class="wp-block-heading" id="the-first-mosque">The first mosque</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Thirteen years later the Prophet left Makkah for Madinah. At Qubāʾ, then a village of palm groves outside the city, he laid the foundations of a mosque on the first day of his arrival; it is counted as the first mosque built in Islam.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> He kept returning to it for the rest of his life: he went to Qubāʾ every Saturday, sometimes walking and sometimes riding, and prayed there.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> He promised that whoever purifies himself at home and then prays in the mosque of Qubāʾ has the reward of an ʿumrah, the lesser pilgrimage.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Qur’an speaks of a mosque founded on piety from the first day:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">لَا تَقُمْ فِيهِ أَبَدًا ۚ لَّمَسْجِدٌ أُسِّسَ عَلَى ٱلتَّقْوَىٰ مِنْ أَوَّلِ يَوْمٍ أَحَقُّ أَن تَقُومَ فِيهِ ۚ فِيهِ رِجَالٌ يُحِبُّونَ أَن يَتَطَهَّرُوا۟ ۚ وَٱللَّهُ يُحِبُّ ٱلْمُطَّهِّرِينَ ١٠٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Do not stand [for prayer] within it, ever. A mosque founded on righteousness from the first day is more worthy for you to stand in. Within it are men who love to purify themselves; and Allah loves those who purify themselves.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 9:108<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The exegetes commonly identify that mosque with Qubāʾ, whose founding the verse seems to describe. A hadith in Muslim’s collection records the Prophet applying the words to his own mosque in Madinah;<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> scholars reconcile the two by holding that both mosques, founded by the Prophet himself, were built on piety from their first day.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="quba-mosque" alt="The Quba Mosque at night, with its white domes and four minarets" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-mosque-today"} -->
<h2 class="wp-block-heading" id="the-mosque-today">The mosque today</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The mosque has been enlarged and rebuilt many times. The present building, designed by the Egyptian architect Abdel-Wahed El-Wakil and completed in 1986, replaced its predecessor entirely; it keeps the ribbed white domes and plain exterior of traditional Madinan building.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> Its complex covers some 13,730 square metres, the largest of the mosques El-Wakil designed in Saudi Arabia.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="quba-courtyard" alt="The Quba Mosque in daylight, with visitors at its gates" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"from-the-cave-to-the-mosque"} -->
<h2 class="wp-block-heading" id="from-the-cave-to-the-mosque">From the cave to the mosque</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The two verses frame the two places. In the cave the command was to recite in the name of the Lord who created: a word given to one man in solitude. At Qubāʾ the verse speaks of a house for the many, founded on piety from its first day and filled with men who love to purify themselves. The Prophet’s own practice joined them, for the promise of an ʿumrah’s reward rests on the same purification the verse praises: the believer washes at home, walks to Qubāʾ, and prays in the first mosque of a religion that began with the word <em>iqraʾ</em> (<span lang="ar" dir="rtl">ٱقْرَأْ</span>, recite).</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-stations-of-the-hajj/">The stations of the Hajj</a>, <a href="/religions/islam/">Islam</a>, <a href="/reference/places/#madinah">Madinah</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Hira and Quba</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Ṣaḥīḥ al-Bukhārī 3, narrated by ʿĀʾishah; cf. Ṣaḥīḥ al-Bukhārī 4953. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2"><a href="https://quran.com/96/1">Qur'an 96:1</a>-5, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">A. A. Macca and T. Aryanti, “The Domes: El Wakil’s Traditionalist Architecture of Quba Mosque,” IOP Publishing, 2017, as catalogued by Asfaar; cf. the Encyclopedia of Translated Prophetic Hadiths (Sunnah.global), explanation to the hadith of Ibn ʿUmar on Qubāʾ. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ṣaḥīḥ al-Bukhārī 1193, narrated by Ibn ʿUmar; cf. Ṣaḥīḥ Muslim 1399g. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Sunan Ibn Mājah 1412; Jāmiʿ al-Tirmidhī 324, graded ḥasan. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Qur'an 9:108, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ṣaḥīḥ Muslim 1398a, narrated by Abū Saʿīd al-Khudrī. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Sunan al-Nasāʾī 698, with the commentary of Ḥāfiẓ Muḥammad Amīn. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">“Quba Mosque,” Madain Project. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Mohammad al-Asad, “The Mosques of Abdel Wahed El-Wakil,” as reproduced by Asfaar. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:what-language-did-abraham-speak', 'photo' => array( 'name' => 'lang-amarna', 'alt' => 'What language did Abraham speak? An Amarna letter written in Akkadian cuneiform on a clay tablet' ), 'type' => 'post', 'slug' => 'what-language-did-abraham-speak', 'title' => 'What language did Abraham speak?',
			'excerpt' => 'Akkadian, Aramaic, Hebrew or Arabic? The world of Abraham, the Jewish and Muslim traditions about his language, and the Qur’anic principle that joins them.', 'description' => 'What language did Abraham speak? The evidence from his world and from Jewish and Muslim tradition. Read the answer.', 'categories' => array( 'history', 'scripture' ), 'days_ago' => 0, 'since' => 77, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>What language did Abraham speak? No inscription records Abraham’s voice, and no scripture names his language. The question can still be answered in two ways: from the world in which Genesis places him, and from the traditions of the peoples who descend from him. The two answers meet more closely than one might expect.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-world-of-abraham">The world of Abraham</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-wandering-aramean">A wandering Aramean</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-the-traditions-say">What the traditions say</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-the-language-of-his-people">In the language of his people</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-brief">What language did Abraham speak? In brief</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-world-of-abraham"} -->
<h2 class="wp-block-heading" id="the-world-of-abraham">The world of Abraham</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Genesis brings Abraham’s family out of Ur of the Chaldeans to Harran, in the north of Mesopotamia, and from Harran to Canaan.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> In the second millennium BCE the written language of that whole region was Akkadian, set down in cuneiform on clay. It served as the language of diplomacy so completely that, in the fourteenth century BCE, the kings of Babylon and the rulers of the cities of Canaan alike wrote to the pharaohs of Egypt in Akkadian, as the tablets found at Tell el-Amarna show.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The everyday speech of a family of herdsmen, however, would have been one of the West Semitic dialects of Syria and upper Mesopotamia, the ancestors of Aramaic and Hebrew.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-wandering-aramean"} -->
<h2 class="wp-block-heading" id="a-wandering-aramean">A wandering Aramean</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Bible itself ties the family to the Arameans. Abraham’s brother Nahor stayed in the north, and his descendants, among them Rebekah’s father Bethuel and her brother Laban, are called Arameans. Israel’s own confession of faith begins, ‘A wandering Aramean was my father.’ When Jacob and Laban set up a heap of stones as a witness between them, Laban names it in Aramaic and Jacob in Hebrew: the two branches of one family already spoke two related tongues.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Hebrew is what the prophet Isaiah calls ‘the language of Canaan’, the speech the family adopted in its new land.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="lang-hebrew" alt="Stones inscribed with Hebrew words" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-traditions-say"} -->
<h2 class="wp-block-heading" id="what-the-traditions-say">What the traditions say</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jewish tradition gave Abraham the holy tongue. The Book of Jubilees, from the second century BCE, tells how an angel opened Abraham’s mouth and taught him Hebrew, the language of creation, which had fallen silent among men since Babel.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Muslim scholars reasoned from the same kinship of languages.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The Andalusian jurist Ibn Ḥazm (d. 1064) observed that Arabic, Hebrew and Syriac differ only as the speech of one people changes over time and place, and concluded that they were once a single language: Syriac was the language of Abraham, Hebrew the language of Isaac and his sons, and Arabic the language of Ishmael and his sons, Ishmael being the first to speak it.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The hadith of the Prophet preserved by al-Bukhārī tells how the tribe of Jurhum settled beside Hagar and her son at Makkah, and how the boy grew up and learnt Arabic from them.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Syriac is a form of Aramaic, so the Muslim tradition and the historical evidence arrive at the same family of languages.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="lang-arabic" alt="An old manuscript in Arabic script" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-the-language-of-his-people"} -->
<h2 class="wp-block-heading" id="in-the-language-of-his-people">In the language of his people</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an states the principle behind all of this:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَمَآ أَرْسَلْنَا مِن رَّسُولٍ إِلَّا بِلِسَانِ قَوْمِهِۦ لِيُبَيِّنَ لَهُمْ ۖ فَيُضِلُّ ٱللَّهُ مَن يَشَآءُ وَيَهْدِى مَن يَشَآءُ ۚ وَهُوَ ٱلْعَزِيزُ ٱلْحَكِيمُ ٤</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And We did not send any messenger except [speaking] in the language of his people to state clearly for them, and Allāh sends astray [thereby] whom He wills and guides whom He wills. And He is the Exalted in Might, the Wise.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 14:4<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>Abraham, on this principle, preached to the people of Mesopotamia in the language of Mesopotamia, whether an early Aramaic or the Akkadian of its cities. His sons carried two sister tongues into two lands. The revelation to Moses came to the line of Isaac in Hebrew; the last revelation came to the line of Ishmael, in the language Ishmael learnt at Makkah, as ‘an Arabic Qur’an’ so that its hearers might understand.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> The question of Abraham’s language turns out to be the history of prophecy itself: one message, spoken in each case in the tongue of the people to whom it was sent.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-brief"} -->
<h2 class="wp-block-heading" id="in-brief">What language did Abraham speak? In brief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>What language did Abraham speak? The evidence points to the Semitic speech of upper Mesopotamia, the ancestor of Aramaic and Hebrew, with Akkadian as the written language of his world. Muslim scholars such as Ibn Ḥazm called it Syriac, and held that Arabic came down to Ishmael’s line.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur’an</a>, <a href="/journal/where-was-abraham-from/">Where was Abraham from?</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Genesis 11:31; 12:4-5. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Alice Mandell, as summarised in “Missives to the Egyptian Court: The Canaanite Amarna Letters and the scribes who wrote them,” <em>Bible History Daily</em>, Biblical Archaeology Society; “Amarna Letters,” <em>Encyclopaedia Britannica</em>. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Genesis 22:20-23; 25:20; 31:47; Deuteronomy 26:5; Richard Gottheil et al., “Aramaic Language among the Jews,” <em>Jewish Encyclopedia</em> (1906). <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Isaiah 19:18. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Jubilees 12:25-27. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Ibn Ḥazm, <em>al-Iḥkām fī uṣūl al-aḥkām</em>, on the relation of the three languages, as translated at Languagehat, “Ibn Hazm on Arabic, Hebrew and Syriac”; the Arabic text is on Wikisource. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ṣaḥīḥ al-Bukhārī 3364, narrated by Ibn ʿAbbās. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8"><a href="https://quran.com/14/4">Qur'an 14:4</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Qur’an 12:2. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-parting-of-the-ways', 'photo' => array( 'name' => 'parting-titus', 'alt' => 'The parting of the ways: the Arch of Titus in Rome' ), 'type' => 'post', 'slug' => 'the-parting-of-the-ways', 'title' => 'The parting of the ways: how Christianity separated from Judaism',
			'excerpt' => 'Jesus and his disciples were Jews. How did their movement become a separate religion? From Acts and Paul to the two wars with Rome and the council of Nicaea.', 'description' => 'The parting of the ways: how Christianity separated from Judaism, from Acts and Paul to Nicaea. Read the history.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 77, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Jesus was a Jew, and so were all his first disciples. They prayed in the Temple, kept the Sabbath and read the Jewish scriptures. Within three centuries their followers formed a separate religion, most of whose members were Gentiles and whose leaders set its calendar apart from the Jewish one. Scholars call the process the parting of the ways, and they agree that it was gradual: estimates of when it was complete run from the middle of the first century to the middle of the fourth, and the break came at different times in different places.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#a-movement-within-judaism">A movement within Judaism</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#two-wars-with-rome">Two wars with Rome</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#two-religions">Two religions</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#one-religion-divided">One religion, divided</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"a-movement-within-judaism"} -->
<h2 class="wp-block-heading" id="a-movement-within-judaism">A movement within Judaism</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Book of Acts shows the first believers meeting daily in the Temple, and records that the disciples were first called Christians at Antioch.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The first great question was whether Gentile converts had to become Jews. A council of the apostles at Jerusalem decided that they need not be circumcised or keep the whole law, asking only that they avoid food offered to idols, blood, what is strangled and sexual immorality.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Paul went further, teaching that a person is made righteous through faith in Christ and not by the works of the law, and he opposed Peter to his face at Antioch over whether Jewish and Gentile believers might eat together.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> See <a href="/journal/paul-and-peter-two-missions/">Paul and Peter</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="parting-capernaum" alt="The ruins of the ancient synagogue at Capernaum on the Sea of Galilee" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"two-wars-with-rome"} -->
<h2 class="wp-block-heading" id="two-wars-with-rome">Two wars with Rome</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The destruction of the Temple by Rome in 70 CE changed both communities. The Christians of Jerusalem, warned by a revelation according to Eusebius, had left the city before the siege for Pella, across the Jordan.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Judaism rebuilt itself around the rabbis, the study of the law and the synagogue. Whether the rabbis then added to the daily prayer a curse on heretics aimed at Jewish Christians, the <em>birkat ha-minim</em>, is much debated; the theory that it expelled Christians from the synagogue in the late first century, once widely held, is now contested.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The second revolt, led by Simon bar Kokhba from 132 to 135, drew a sharper line. Justin Martyr, writing some twenty years later, complained that Bar Kokhba had ordered Christians alone to be punished unless they denied Jesus.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Jewish Christians could not follow a rival messiah, and after the war Jerusalem was rebuilt as a pagan colony from which Jews were barred.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"two-religions"} -->
<h2 class="wp-block-heading" id="two-religions">Two religions</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>By the fourth century the separation was a matter of law and calendar. At Nicaea in 325 the bishops fixed the date of Easter so that it no longer depended on the Jewish reckoning of Passover. See <a href="/journal/the-council-of-nicaea/">Nicaea, 325</a>. Some historians still doubt that the ways ever fully parted, pointing to Jews and Christians who continued to share practices for centuries.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="parting-pella" alt="The colonnaded ruins of Pella in the Jordan valley, where the Christians of Jerusalem took refuge" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"one-religion-divided"} -->
<h2 class="wp-block-heading" id="one-religion-divided">One religion, divided</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an describes the same pattern in general terms:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">كَانَ ٱلنَّاسُ أُمَّةً وَٰحِدَةً فَبَعَثَ ٱللَّهُ ٱلنَّبِيِّـۧنَ مُبَشِّرِينَ وَمُنذِرِينَ وَأَنزَلَ مَعَهُمُ ٱلْكِتَـٰبَ بِٱلْحَقِّ لِيَحْكُمَ بَيْنَ ٱلنَّاسِ فِيمَا ٱخْتَلَفُوا۟ فِيهِ ۚ وَمَا ٱخْتَلَفَ فِيهِ إِلَّا ٱلَّذِينَ أُوتُوهُ مِنۢ بَعْدِ مَا جَآءَتْهُمُ ٱلْبَيِّنَـٰتُ بَغْيًۢا بَيْنَهُمْ ۖ فَهَدَى ٱللَّهُ ٱلَّذِينَ ءَامَنُوا۟ لِمَا ٱخْتَلَفُوا۟ فِيهِ مِنَ ٱلْحَقِّ بِإِذْنِهِۦ ۗ وَٱللَّهُ يَهْدِى مَن يَشَآءُ إِلَىٰ صِرَٰطٍ مُّسْتَقِيمٍ ٢١٣</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Mankind was [of] one religion [before their deviation]; then Allāh sent the prophets as bringers of good tidings and warners and sent down with them the Scripture in truth to judge between the people concerning that in which they differed. And none differed over it [i.e., the Scripture] except those who were given it - after the clear proofs came to them - out of jealous animosity among themselves. And Allāh guided those who believed to the truth concerning that over which they had differed, by His permission. And Allāh guides whom He wills to a straight path.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 2:213<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The history of the parting follows the verse closely. The first believers were one community with the Jews of their day, sharing one scripture and one Temple. The division came after the scripture had been given, over how it was to be read: over the law, over the Messiah, over who belonged to the covenant. In the Qur’an’s account the prophets brought one religion, and the divisions among those who received their scriptures are the work of their followers. The Qur’an presents itself as the judge between those who differed.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/paul-and-peter-two-missions/">Paul and Peter: two missions in the early church</a>, <a href="/journal/the-council-of-nicaea/">Nicaea, 325</a>, <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the parting of the ways</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Anne Amos, “The Parting of the Ways,” Jewish-Christian Relations (jcrelations.net); Mariusz Rosik, <em>Church and Synagogue (30-313 AD): Parting of the Ways</em> (Berlin: Peter Lang, 2019). <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Acts 2:46; 11:26. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Acts 15:1-29. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Galatians 2:11-16. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Eusebius, <em>Ecclesiastical History</em> 3.5.3. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Joel Marcus, “Birkat ha-Minim Revisited,” <em>New Testament Studies</em> 55 (2009), discussing the thesis of J. Louis Martyn. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Justin Martyr, <em>First Apology</em> 31.6. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">“The Ways that Never Parted: A Roundtable,” <em>Studies in Late Antiquity</em> 9 (2025), pp. 373-429. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9"><a href="https://quran.com/2/213">Qur'an 2:213</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:where-was-abraham-from', 'photo' => array( 'name' => 'ur-balikligol', 'alt' => 'Where was Abraham from? The Pool of Abraham, Balıklıgöl, at Şanlıurfa' ), 'type' => 'post', 'slug' => 'where-was-abraham-from', 'title' => 'Where was Abraham from? Ur, Harran and Urfa',
			'excerpt' => 'Genesis names Ur of the Chaldeans. Archaeologists point to southern Iraq, others to the north, and Urfa claims him by tradition. The evidence, and the fire of the Qur’an.', 'description' => 'Where was Abraham from? Ur in southern Iraq, Harran, or Urfa in Türkiye: the evidence and the traditions. Read more.', 'categories' => array( 'history', 'archaeology' ), 'days_ago' => 0, 'since' => 77, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Where was Abraham from? Genesis names Abraham’s birthplace as Ur of the Chaldeans, <em>Ur Kasdim</em>, and says that his father Terah took the family from there to Harran, where Terah died, and that Abraham went on from Harran to Canaan at seventy-five.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Stephen, in the Book of Acts, adds that God first appeared to Abraham ‘in Mesopotamia, before he lived in Harran’.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Where Ur lay has been argued over for more than two thousand years, and three places now claim him.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#ur-in-the-south">Ur in the south</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#harran-and-the-north">Harran and the north</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#urfa-and-the-pool-of-abraham">Urfa and the Pool of Abraham</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-fire-that-did-not-burn">The fire that did not burn</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-brief">Where was Abraham from? In brief</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"ur-in-the-south"} -->
<h2 class="wp-block-heading" id="ur-in-the-south">Ur in the south</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In 1862 Henry Rawlinson identified Ur with Tell el-Muqayyar, a mound near Nasiriyah in southern Iraq, and Leonard Woolley’s excavations there in the 1920s uncovered the Sumerian city and its great ziggurat. Most scholars accept the identification.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> An ancient witness points the same way: the Greek-writing historian known as Pseudo-Eupolemus, quoted by Eusebius, placed Abraham’s birth in the Babylonian city of Camarina, ‘which some call Uria’.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> One difficulty remains. The Chaldeans settled in southern Mesopotamia only in the early first millennium BCE, long after any date proposed for Abraham, so the phrase ‘of the Chaldeans’ reflects the time when Genesis was written down.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="ur-ziggurat-pexels" alt="Visitors before the stairway of the ziggurat of Ur in southern Iraq" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"harran-and-the-north"} -->
<h2 class="wp-block-heading" id="harran-and-the-north">Harran and the north</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Harran lies far to the north, on the Balikh river in what is now south-eastern Türkiye, and the Bible’s account of Abraham’s kin keeps returning to that region: Nahor’s family stayed there, and Isaac and Jacob both took wives from it. For this reason some scholars, the Assyriologist Cyrus Gordon among them, have placed Ur in the north, near Harran.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Harran itself later became the city of the Sabians; see <a href="/journal/sabians-in-classical-muslim-texts/">The Sabians in classical Muslim scholarship</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="ur-harran-houses" alt="The beehive houses of Harran in south-eastern Türkiye" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"urfa-and-the-pool-of-abraham"} -->
<h2 class="wp-block-heading" id="urfa-and-the-pool-of-abraham">Urfa and the Pool of Abraham</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>About forty kilometres north of Harran stands Şanlıurfa, ancient Edessa, which Jewish, Christian and Muslim tradition have long honoured as Abraham’s birthplace. Pilgrims visit the cave where he is said to have been born, and the pool of Balıklıgöl beside the mosque of Khalil al-Rahman, built by the Ayyubids in 1211.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Local tradition holds that King Nimrod had Abraham cast into a fire from the citadel above, and that God turned the fire into water and the burning logs into the carp that still fill the pool. Türkiye’s museum authority notes plainly that the association is a tradition that history has not proven.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-fire-that-did-not-burn"} -->
<h2 class="wp-block-heading" id="the-fire-that-did-not-burn">The fire that did not burn</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The tradition at Urfa is an echo of the Qur’an, which tells how Abraham broke the idols of his people and how they answered him:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">قَالُوا۟ حَرِّقُوهُ وَٱنصُرُوٓا۟ ءَالِهَتَكُمْ إِن كُنتُمْ فَـٰعِلِينَ ٦٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">They said, "Burn him and support your gods - if you are to act."</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">قُلْنَا يَـٰنَارُ كُونِى بَرْدًا وَسَلَـٰمًا عَلَىٰٓ إِبْرَٰهِيمَ ٦٩</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">We [i.e., Allāh] said, "O fire, be coolness and safety upon Abraham."</p>
<!-- /wp:paragraph -->
<cite>Qur’an 21:68-69<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The Qur’an names neither the city nor the king. What it records is the command to the fire, and the tradition of Urfa has given that command a place: a pool of cool water where the fire had been. Whether Abraham came from Ur in the south or from the country around Harran, the story that matters to the Qur’an happened among his own people, in the land of idols he left behind, and the fire meant to destroy him became coolness and safety.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-brief"} -->
<h2 class="wp-block-heading" id="in-brief">Where was Abraham from? In brief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Where was Abraham from? Genesis names Ur of the Chaldeans, most often identified with Tell el-Muqayyar in southern Iraq, and places his family afterwards in Harran; the tradition of Urfa in Türkiye also claims him. The Qur’an names no city; it tells of his people, their idols and the fire that did not burn him.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/what-language-did-abraham-speak/">What language did Abraham speak?</a>, <a href="/journal/archaeology-and-scripture/">What archaeology tells us about the ancient Near East</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Genesis 11:28-32; 12:4-5. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Acts 7:2-4. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ferrell Jenkins, “Traditions about Abraham at Şanlıurfa, Turkey, Part 1,” 31 July 2016. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Eusebius, <em>Preparation for the Gospel</em> 9.17, quoting Alexander Polyhistor. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Jenkins, op. cit.; Genesis 24:10; 28:2. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">“Pool of the Sacred Fish (Sanliurfa),” Madain Project. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">“Şanlıurfa and the Legend of Balıklıgöl,” Turkish Museums, 26 December 2023. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8"><a href="https://quran.com/21/68">Qur'an 21:68</a>-69, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-symbols-of-the-four-traditions', 'photo' => array( 'name' => 'symbols-star', 'alt' => 'The symbols: a Star of David in a synagogue window' ), 'type' => 'post', 'slug' => 'the-symbols-of-the-four-traditions', 'title' => 'The symbols of the four traditions',
			'excerpt' => 'The Star of David, the Mandaean banner, the cross and the crescent: where each came from, how old each is, and why Islam, strictly, has no sacred symbol.', 'description' => 'The symbols of the four traditions: the Star of David, the Mandaean banner, the cross and the crescent. Read more.', 'categories' => array( 'culture', 'history' ), 'days_ago' => 0, 'since' => 77, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The symbols of the four traditions are younger, in most cases, than the faiths themselves. Each of the four traditions is recognised today by a symbol: the six-pointed star, the Mandaean banner, the cross and the crescent. Only some of these are as old as they look, and one tradition, strictly, has no sacred symbol at all.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-star-of-david">The Star of David</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-mandaean-banner">The Mandaean banner</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-cross">The cross</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-crescent">The crescent</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-religion-without-an-emblem">A religion without an emblem</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-star-of-david"} -->
<h2 class="wp-block-heading" id="the-star-of-david">The Star of David</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The six-pointed star, the Magen David or Shield of David, has no authority in the Bible or the Talmud. It was used for centuries as a decoration and a charm by many peoples, Jews among them, and Jewish mystics of the Middle Ages ascribed powers to it.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The Jewish community of Prague was the first to adopt it as an official emblem; from the seventeenth century many communities used it on their seals, and in the nineteenth century Jews adopted it almost everywhere as a simple sign of Judaism, in imitation of the Christian cross. The yellow star forced on Jews in Nazi-occupied Europe gave it a further meaning of martyrdom.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The older Jewish emblem is the seven-branched lampstand of the Temple, the menorah, which appears on the Arch of Titus in Rome and is the emblem of the State of Israel today.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-mandaean-banner"} -->
<h2 class="wp-block-heading" id="the-mandaean-banner">The Mandaean banner</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Mandaean <em>drabsha</em>, the banner, is a pole with a cross-piece from which hangs a long strip of unbleached white silk, crowned with a myrtle wreath. It stands beside the river at baptisms. E. S. Drower, who watched it consecrated, recorded that the cross-piece had led some observers to see in Mandaeism a form of Christianity, and rejected the idea: the banner, she wrote, is purely a symbol of light, and it is the silk, never the wooden staff, that has ritual meaning.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="symbols-drabsha" alt="Mandaean priests consecrating the drabsha, the white silk banner, in the 1930s" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-cross"} -->
<h2 class="wp-block-heading" id="the-cross">The cross</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The cross stands for the crucifixion, yet for three centuries Christians hardly showed it. Clement of Alexandria, around 200, recommended a dove, a fish, a ship, a lyre and an anchor as fit images for a Christian’s seal ring; the fish was prized because its Greek name, <em>ichthys</em>, spelled the initials of ‘Jesus Christ, Son of God, Saviour’.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Before Constantine, Christians were reluctant to display the cross because it exposed them to ridicule and danger. Constantine abolished crucifixion as a punishment and promoted the cross and the chi-rho monogram, and from about 350 they became the common emblems of Christian art.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="symbols-cross" alt="Church domes crowned with crosses against the evening sky" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-crescent"} -->
<h2 class="wp-block-heading" id="the-crescent">The crescent</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The crescent is the youngest of the four as a religious emblem. The moon in its first quarter was a sign of the goddess Astarte in the ancient Near East and later of the city of Byzantium.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The Ottoman Turks carried it on the standards of their infantry under Sultan Orhan in the fourteenth century, and it became so closely tied to the Ottoman state, its flags and the tops of its minarets that it came to stand for the Muslim world as a whole. It appears on the flags of Türkiye, Pakistan, Malaysia and other Muslim countries, and in the Red Crescent.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The first Muslims had no such emblem: the armies of the Prophet’s time carried plain flags of a single colour for identification.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="symbols-crescent" alt="A golden mosque dome crowned with a crescent" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-religion-without-an-emblem"} -->
<h2 class="wp-block-heading" id="a-religion-without-an-emblem">A religion without an emblem</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Islam’s lack of a sacred symbol follows from its idea of worship. Muslims pray toward a place, the Kaaba, and decorate their mosques with the written word, above all the name of God, and with geometry and plants, avoiding images of living beings in worship. The crescent is a useful sign on a map or a minaret, and many Muslims value it as such, but no Muslim prays to it, and the faith would be complete without it.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/abrahamic-family-tree/">The Abrahamic family tree and what the traditions share</a>, <a href="/journal/masbuta-baptism-in-running-water/">Maṣbūtā: baptism in running water</a>, <a href="/journal/hagia-sophia/">Hagia Sophia</a>, <a href="https://www.britannica.com/topic/Star-of-David">Star of David (Encyclopaedia Britannica)</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the symbols</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">“Star of David,” <em>Encyclopaedia Britannica</em>. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">E. S. Drower, <em>The Mandaeans of Iraq and Iran</em> (Oxford: Clarendon Press, 1937), pp. 108-109. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">“When did the cross supplant the ichthus (fish) as a symbol of the Christian faith?,” <em>Christian History</em>, Christianity Today, 26 February 2009. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">“Cross,” <em>Encyclopaedia Britannica</em>. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">“Crescent,” <em>Encyclopaedia Britannica</em>. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">“Is the crescent moon the symbol of Islam?,” Fiqh, IslamOnline. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:religious-law-in-the-abrahamic-traditions', 'photo' => array( 'name' => 'law-torah', 'alt' => 'Religious law: a Torah scroll read with a pointer' ), 'type' => 'post', 'slug' => 'religious-law', 'title' => 'Religious law in the Abrahamic traditions: halakhah, canon law and the sharīʿah',
			'excerpt' => 'Jewish halakhah, Christian canon law, the Islamic sharīʿah and the Mandaean rules of purity: what each is, where it comes from, and what the Qur’an says of their differences.', 'description' => 'Halakhah, canon law and the sharia: how the Abrahamic traditions understand religious law. Compare them here.', 'categories' => array( 'religion', 'theology' ), 'days_ago' => 0, 'since' => 77, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Religious law, the law believed to come from God himself, shapes daily life in three of the four traditions. Three of the four traditions are religions of law as much as of belief: they hold that God has given commands for the whole of life, from prayer and food to marriage, trade and justice, and they have built great bodies of scholarship to apply them. Christianity took a different path, and the contrast explains much about all four.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#halakhah">Halakhah</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#canon-law">Canon law</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#sharia">The sharīʿah</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mandaean-rules-of-purity">Mandaean rules of purity</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-law-and-a-method">A law and a method</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"halakhah"} -->
<h2 class="wp-block-heading" id="halakhah">Halakhah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jewish law is called <em>halakhah</em> (Hebrew, ‘the way to walk’). The rabbis counted 613 commandments in the Torah, 248 positive and 365 negative; the count is first recorded in the Talmud in the name of Rabbi Simlai in the third century.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The Torah was interpreted through the oral tradition written down in the Mishnah around 200 CE and discussed at length in the Talmud, and codified in the Middle Ages, most famously by Maimonides in his Mishneh Torah, whose list of the 613 commandments is the one most often used.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Many commandments depend on the Temple and cannot be kept since its destruction.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"canon-law"} -->
<h2 class="wp-block-heading" id="canon-law">Canon law</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The first Christians were released from most of the ritual law of Moses: the apostles at Jerusalem required of Gentile converts only that they avoid food offered to idols, blood, what is strangled and sexual immorality.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> What grew in its place was canon law, the law the church made for its own government, worship and discipline.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>It began with the canons of councils such as Nicaea, and was gathered by the monk Gratian around 1140 into a collection that became the core of the medieval <em>Corpus juris canonici</em>. The Catholic Church issued a Code of Canon Law in 1917 and a revised code in 1983, and the Orthodox and other churches keep their own collections.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Canon law governs the church; it does not claim, as the Torah and the Qur’an do, to lay down God’s law for every part of a believer’s life.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="law-books" alt="Bound volumes of law on a library shelf" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"sharia"} -->
<h2 class="wp-block-heading" id="sharia">The sharīʿah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Islamic law, the <em>sharīʿah</em> (<span lang="ar" dir="rtl">شَرِيعَة</span>, the path to the watering place), is the law God has revealed; <em>fiqh</em> (<span lang="ar" dir="rtl">فِقْه</span>, understanding) is the scholars’ effort to derive it. Its classical sources are four: the Qur’an, the <em>sunnah</em> or practice of the Prophet, the consensus of the scholars, and reasoning by analogy, the scheme set out by al-Shāfiʿī in the ninth century.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Like halakhah, it covers worship and daily life together: prayer, fasting, alms, food, marriage, inheritance and commerce. Four Sunni schools of law, the Ḥanafī, Mālikī, Shāfiʿī and Ḥanbalī, grew from the same sources and recognise one another.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="law-manuscript" alt="An illuminated page of Arabic script" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mandaean-rules-of-purity"} -->
<h2 class="wp-block-heading" id="mandaean-rules-of-purity">Mandaean rules of purity</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeism has no body of case law comparable to the others, but it binds its people with detailed rules of purity: what may be eaten, how animals are slaughtered, how often and in what water a believer must be baptised, and how priests must live apart from pollution.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-law-and-a-method"} -->
<h2 class="wp-block-heading" id="a-law-and-a-method">A law and a method</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an speaks directly to the relation between these laws:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَأَنزَلْنَآ إِلَيْكَ ٱلْكِتَـٰبَ بِٱلْحَقِّ مُصَدِّقًا لِّمَا بَيْنَ يَدَيْهِ مِنَ ٱلْكِتَـٰبِ وَمُهَيْمِنًا عَلَيْهِ ۖ فَٱحْكُم بَيْنَهُم بِمَآ أَنزَلَ ٱللَّهُ ۖ وَلَا تَتَّبِعْ أَهْوَآءَهُمْ عَمَّا جَآءَكَ مِنَ ٱلْحَقِّ ۚ لِكُلٍّ جَعَلْنَا مِنكُمْ شِرْعَةً وَمِنْهَاجًا ۚ وَلَوْ شَآءَ ٱللَّهُ لَجَعَلَكُمْ أُمَّةً وَٰحِدَةً وَلَـٰكِن لِّيَبْلُوَكُمْ فِى مَآ ءَاتَىٰكُمْ ۖ فَٱسْتَبِقُوا۟ ٱلْخَيْرَٰتِ ۚ إِلَى ٱللَّهِ مَرْجِعُكُمْ جَمِيعًا فَيُنَبِّئُكُم بِمَا كُنتُمْ فِيهِ تَخْتَلِفُونَ ٤٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And We have revealed to you, [O Muḥammad], the Book [i.e., the Qur’ān] in truth, confirming that which preceded it of the Scripture and as a criterion over it. So judge between them by what Allāh has revealed and do not follow their inclinations away from what has come to you of the truth. To each of you We prescribed a law and a method. Had Allāh willed, He would have made you one nation [united in religion], but [He intended] to test you in what He has given you; so race to [all that is] good. To Allāh is your return all together, and He will [then] inform you concerning that over which you used to differ.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 5:48<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse accounts for both the likeness and the difference. Each community received ‘a law and a method’: the Torah for the Jews, with its commandments; and for the Muslims the sharīʿah, confirming what came before and judging over it. The laws differ in their details because God willed that they should, and the verse turns the difference into a test: ‘so race to all that is good.’ The history of the three legal traditions, each labouring for centuries to live by what it believed God had commanded, is a record of that race.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/food-and-faith/">Food and faith</a>, <a href="/journal/apostasy-in-the-abrahamic-faiths/">Apostasy in the Abrahamic traditions</a>, <a href="/journal/the-parting-of-the-ways/">The parting of the ways</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on religious law</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Babylonian Talmud, Makkot 23b. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Maimonides, <em>Sefer ha-Mitzvot</em>, and the enumeration of the commandments that opens the <em>Mishneh Torah</em>. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Acts 15:28-29; cf. Matthew 5:17; Galatians 2:16. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">“Canon law,” <em>Encyclopaedia Britannica</em>, summary; “Code of Canon Law,” <em>Encyclopaedia Britannica</em>. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">al-Shāfiʿī, <em>al-Risālah</em>, on the sources of law. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Drower, <em>The Mandaeans of Iraq and Iran</em>, pp. 47-48, 174. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7"><a href="https://quran.com/5/48">Qur'an 5:48</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:food-and-faith', 'photo' => array( 'name' => 'food-market', 'alt' => 'Food and faith: a butcher preparing halal meat in a market' ), 'type' => 'post', 'slug' => 'food-and-faith', 'title' => 'Food and faith: kosher, halal and the Christian table',
			'excerpt' => 'Why Jews and Muslims do not eat pork, why most Christians do, and what Mandaeans may not eat: the food laws of the four traditions, and the verse that opens the Muslim table.', 'description' => 'Food and faith in four traditions: kosher, halal, the Christian table and Mandaean rules compared. Read the guide.', 'categories' => array( 'culture', 'religion' ), 'days_ago' => 0, 'since' => 77, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Food and faith are closely bound in the Abrahamic traditions. Few things mark a religious community as plainly as what it eats. Three of the four Abrahamic traditions keep detailed food laws; the fourth set most of them aside in its first generation. The rules differ in their details, but they rest on a shared conviction that eating is an act before God.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#kashrut">Kashrut: the Jewish table</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-christian-table">The Christian table</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#halal">Ḥalāl: the Muslim table</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-mandaean-table">The Mandaean table</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-food-of-those-given-the-scripture">The food of those given the scripture</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"kashrut"} -->
<h2 class="wp-block-heading" id="kashrut">Kashrut: the Jewish table</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Torah permits land animals that both chew the cud and have split hooves, which excludes the pig, the camel and the hare; fish with fins and scales; and birds not listed among the forbidden. Blood may not be eaten, and three times the Torah forbids boiling a kid in its mother’s milk, from which the rabbis derived the complete separation of meat and dairy.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Food prepared according to these laws is <em>kosher</em>, fit.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="food-challah" alt="Hands breaking challah bread at a Sabbath table" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-christian-table"} -->
<h2 class="wp-block-heading" id="the-christian-table">The Christian table</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Gospel of Mark reports Jesus saying that nothing entering a person from outside can defile him, and adds that in saying this he declared all foods clean. In Acts, Peter sees a sheet let down from heaven full of animals and hears a voice telling him not to call unclean what God has made clean.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The council of Jerusalem kept only a short list for Gentile believers, to abstain from food offered to idols, from blood and from what is strangled, and in time most churches dropped even these.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Christianity kept its food customs in the calendar instead, in the fasts of Lent and the Orthodox abstention from meat and dairy on fast days.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="food-table" alt="Bread, grapes and wine on a table" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"halal"} -->
<h2 class="wp-block-heading" id="halal">Ḥalāl: the Muslim table</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an forbids carrion, blood, the flesh of swine and what has been dedicated to other than God, and permits whatever a believer is forced to eat to survive.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Wine and other intoxicants are forbidden. An animal is slaughtered with the name of God pronounced over it, by a swift cut that drains the blood. Food that meets these conditions is <em>ḥalāl</em> (<span lang="ar" dir="rtl">حَلَال</span>, permitted). The list of forbidden meats is shorter than the Torah’s, and the Qur’an presents some of the Jewish prohibitions as a burden placed on the Israelites for their conduct, lifted from those who follow the Prophet.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-mandaean-table"} -->
<h2 class="wp-block-heading" id="the-mandaean-table">The Mandaean table</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeans may eat only meat that has been ritually slaughtered, and may not touch blood. Like their Jewish and Muslim neighbours they avoid the pig, the camel, the horse, the dog and the hare, but unlike them they consider it a crime to kill an ox or a buffalo, created, a Mandaean high priest told Drower, for ploughing and for milk. Scaleless fish are forbidden, and all food is washed in the river with the name of the Life pronounced over it. In practice little meat is eaten, and several Mandaeans told Drower that even lawful slaughter is a sin.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-food-of-those-given-the-scripture"} -->
<h2 class="wp-block-heading" id="the-food-of-those-given-the-scripture">The food of those given the scripture</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an sets the rule for how Muslims are to regard the food of their neighbours:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">ٱلْيَوْمَ أُحِلَّ لَكُمُ ٱلطَّيِّبَـٰتُ ۖ وَطَعَامُ ٱلَّذِينَ أُوتُوا۟ ٱلْكِتَـٰبَ حِلٌّ لَّكُمْ وَطَعَامُكُمْ حِلٌّ لَّهُمْ ۖ وَٱلْمُحْصَنَـٰتُ مِنَ ٱلْمُؤْمِنَـٰتِ وَٱلْمُحْصَنَـٰتُ مِنَ ٱلَّذِينَ أُوتُوا۟ ٱلْكِتَـٰبَ مِن قَبْلِكُمْ إِذَآ ءَاتَيْتُمُوهُنَّ أُجُورَهُنَّ مُحْصِنِينَ غَيْرَ مُسَـٰفِحِينَ وَلَا مُتَّخِذِىٓ أَخْدَانٍ ۗ وَمَن يَكْفُرْ بِٱلْإِيمَـٰنِ فَقَدْ حَبِطَ عَمَلُهُۥ وَهُوَ فِى ٱلْـَٔاخِرَةِ مِنَ ٱلْخَـٰسِرِينَ ٥</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">This day [all] good foods have been made lawful, and the food of those who were given the Scripture is lawful for you and your food is lawful for them. And [lawful in marriage are] chaste women from among the believers and chaste women from among those who were given the Scripture before you, when you have given them their due compensation, desiring chastity, not unlawful sexual intercourse or taking [secret] lovers. And whoever denies the faith - his work has become worthless, and he, in the Hereafter, will be among the losers.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 5:5<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse makes the Muslim table open where the other laws close it. It declares the food of Jews and Christians lawful to Muslims, and Muslim food lawful to them, so that the rules of <em>ḥalāl</em> give Muslims and the People of the Book a shared table. The same verse permits marriage with their chaste women. In the Qur’an’s view the food laws of the Abrahamic family are branches of one law, and the verse treats the families that keep them as neighbours who may eat together.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/religious-law/">Religious law in the Abrahamic traditions</a>, <a href="/journal/prayer-in-abrahamic-traditions/">Prayer across the Abrahamic traditions</a>, <a href="/religions/mandaeism/">Mandaeism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on food and faith</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Leviticus 11:1-23; 17:10-14; Exodus 23:19; 34:26; Deuteronomy 14:21. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Mark 7:18-19; Acts 10:9-16. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Acts 15:29. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><a href="https://quran.com/2/173">Qur’an 2:173</a>; cf. 5:3; 6:145. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 6:146; 7:157. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Drower, <em>The Mandaeans of Iraq and Iran</em>, pp. 47-48. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Qur'an 5:5, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:war-and-peace-in-the-abrahamic-traditions', 'photo' => array( 'name' => 'peace-ploughshares', 'alt' => 'War and peace: the Swords into Plowshares statue at the United Nations' ), 'type' => 'post', 'slug' => 'war-and-peace', 'title' => 'Are the Abrahamic religions violent? War and peace in scripture and history',
			'excerpt' => 'Has religion caused most wars? What the historical record shows, what the scriptures of each tradition command about war and peace, and the verse that weighs one life against all mankind.', 'description' => 'Are the Abrahamic religions violent? The historical record and what each scripture teaches on war and peace. Read on.', 'categories' => array( 'religion', 'history', 'interfaith-studies' ), 'days_ago' => 0, 'since' => 77, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>War and peace are treated in the scriptures of all four traditions. It is often said that the Abrahamic religions are especially violent, even that religion has caused most of the wars in history. The claim deserves a serious answer, which means looking both at the historical record and at what the scriptures of each tradition actually command.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#what-the-record-shows">What the record shows</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-hebrew-bible-and-judaism">The Hebrew Bible and Judaism</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#christianity">Christianity</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#islam">Islam</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mandaeism">Mandaeism</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#as-if-he-had-saved-mankind">As if he had saved mankind</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"what-the-record-shows"} -->
<h2 class="wp-block-heading" id="what-the-record-shows">What the record shows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The figure most often quoted in reply comes from the <em>Encyclopedia of Wars</em> of Charles Phillips and Alan Axelrod, which catalogues 1,763 wars across recorded history. Its index lists 121 of them under religious wars, about seven per cent.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The historian Andrew Holt has shown that the popular round figure of 123 comes from later commentators, and that the encyclopedia’s own index is a rough guide, since other wars in it had religious elements.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>A second reference work, the <em>Encyclopedia of War</em> edited by Gordon Martel, counts about six per cent of its wars as religious.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The theologian William Cavanaugh has argued further that the line between ‘religious’ and ‘secular’ violence is itself a modern Western invention, since wars called religious always had political and economic causes, and wars called secular have been fought for beliefs held with religious intensity.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> The deadliest wars of the twentieth century were fought for nation, race and class.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="peace-doves" alt="White doves over the walls of an old fortress" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-hebrew-bible-and-judaism"} -->
<h2 class="wp-block-heading" id="the-hebrew-bible-and-judaism">The Hebrew Bible and Judaism</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Hebrew Bible contains wars of conquest, and also some of the oldest laws of restraint in war: an army must offer peace to a city before attacking it, and must not cut down its fruit trees. Its prophets gave the world its most famous vision of peace, when nations ‘shall beat their swords into ploughshares’.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Mishnah teaches that whoever destroys a single life is regarded as though he had destroyed a whole world, and whoever saves a single life as though he had saved a whole world.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"christianity"} -->
<h2 class="wp-block-heading" id="christianity">Christianity</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jesus blessed the peacemakers, told his followers to love their enemies, and told Peter to put away his sword, ‘for all who take the sword will perish by the sword’.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Some early Christian writers, Tertullian among them, held that a Christian could not serve as a soldier. Once the empire became Christian, Augustine developed the theory of the just war, and the church later preached the Crusades; the same tradition also produced the peace movements and the modern laws of war.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"islam"} -->
<h2 class="wp-block-heading" id="islam">Islam</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an permitted fighting only after the Muslims of Makkah had suffered years of persecution, ‘because they were wronged’, and it binds the permission with limits: fight those who fight you, and do not transgress; if the enemy inclines to peace, incline to it too; there shall be no compulsion in religion.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The first caliph, Abū Bakr, sending his armies into Syria, gave them ten commands: not to kill women, children or the old and infirm, not to cut down fruit trees, not to destroy inhabited places, not to slaughter sheep or camels except for food, and to leave in peace those who had devoted themselves to worship in their cells.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Islamic law built on these commands a detailed law of war centuries before the Geneva Conventions.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="peace-dove-olive" alt="A dove with an olive branch" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mandaeism"} -->
<h2 class="wp-block-heading" id="mandaeism">Mandaeism</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeism teaches that all killing and all shedding of blood is sinful, so that even lawful slaughter for food is an act for which Mandaeans feel the need to apologise.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> Drower was told by several pious Mandaeans that a deeply religious man gives up meat and fish altogether.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"as-if-he-had-saved-mankind"} -->
<h2 class="wp-block-heading" id="as-if-he-had-saved-mankind">As if he had saved mankind</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an sets the principle in words addressed first to the Children of Israel:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">مِنْ أَجْلِ ذَٰلِكَ كَتَبْنَا عَلَىٰ بَنِىٓ إِسْرَٰٓءِيلَ أَنَّهُۥ مَن قَتَلَ نَفْسًۢا بِغَيْرِ نَفْسٍ أَوْ فَسَادٍ فِى ٱلْأَرْضِ فَكَأَنَّمَا قَتَلَ ٱلنَّاسَ جَمِيعًا وَمَنْ أَحْيَاهَا فَكَأَنَّمَآ أَحْيَا ٱلنَّاسَ جَمِيعًا ۚ وَلَقَدْ جَآءَتْهُمْ رُسُلُنَا بِٱلْبَيِّنَـٰتِ ثُمَّ إِنَّ كَثِيرًا مِّنْهُم بَعْدَ ذَٰلِكَ فِى ٱلْأَرْضِ لَمُسْرِفُونَ ٣٢</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Because of that, We decreed upon the Children of Israel that whoever kills a soul unless for a soul or for corruption [done] in the land - it is as if he had slain mankind entirely. And whoever saves one - it is as if he had saved mankind entirely. And Our messengers had certainly come to them with clear proofs. Then indeed many of them, [even] after that, throughout the land, were transgressors.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 5:32<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse restates for all humanity the teaching the Mishnah preserved: one life weighs as much as the whole of mankind. That shared principle is the best answer to the charge with which this article began. The Abrahamic scriptures do permit war, under conditions, as nearly every political order has; what they add is the insistence that every life belongs to God, that war must be limited and just, and that peace is to be accepted whenever it is offered. Wars fought in the name of these religions were fought against their own teaching whenever they broke those limits.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/amman-message-and-a-common-word/">The Amman Message and A Common Word</a>, <a href="/journal/interfaith-dialogue/">Interfaith dialogue in the modern era</a>, <a href="/journal/apostasy-in-the-abrahamic-faiths/">Apostasy in the Abrahamic traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on war and peace</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Andrew Holt, “Counting ‘Religious Wars’ in the Encyclopedia of Wars,” 26 December 2018, citing Charles Phillips and Alan Axelrod, <em>Encyclopedia of Wars</em> (New York: Facts on File, 2005), vol. 3, pp. 1484-1485. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Gordon Martel (ed.), <em>The Encyclopedia of War</em> (Oxford: Wiley-Blackwell, 2012). <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">William T. Cavanaugh, <em>The Myth of Religious Violence: Secular Ideology and the Roots of Modern Conflict</em> (New York: Oxford University Press, 2009). <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Deuteronomy 20:10, 19; Isaiah 2:4. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Mishnah, Sanhedrin 4:5. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Matthew 5:9, 44; 26:52. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7"><a href="https://quran.com/22/39">Qur’an 22:39</a>; 2:190; 8:61; 2:256. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8"><em>Muwaṭṭaʾ</em> of Mālik, Book 21 (Jihād), Hadith 10. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Drower, <em>The Mandaeans of Iraq and Iran</em>, p. 48. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Qur'an 5:32, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-islamic-dilemma', 'photo' => array( 'name' => 'dilemma-quran-stand', 'alt' => 'The Islamic Dilemma: an open Qur’an on a wooden stand' ), 'type' => 'post', 'slug' => 'the-islamic-dilemma', 'title' => 'The Islamic Dilemma: the argument and the answer',
			'excerpt' => 'If the Gospel is the word of God, Islam is false; if it is not, Islam is still false. The Islamic Dilemma at its strongest, and the Qur’anic verse that answers it.', 'description' => 'The Islamic Dilemma explained and answered: the verses, the premises and the Qur’an’s own reply. Read the analysis.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 79, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The ‘Islamic Dilemma’ is an argument made by Christian apologists against Islam, popularised above all by the American apologist David Wood.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Its shape is simple. The Qur’an, it says, affirms the Torah and the Gospel. If the Gospel is the word of God, Islam is false because it contradicts the Gospel; if the Gospel is not the word of God, Islam is false because the Qur’an affirmed it. As the argument’s own website puts it, “By affirming scriptures that contradict its core teachings, Islam self-destructs.”<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> This article sets out the argument at its strongest, and then examines the premises on which it rests.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-argument-at-its-strongest">The argument at its strongest</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-confirming-means">What {Q}confirming{Q} means</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#which-gospel">Which Gospel?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-quran-already-speaks-of-alteration">The Qur’an already speaks of alteration</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-bible-of-the-seventh-century">The Bible of the seventh century</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-verse-that-answers-the-dilemma">The verse that answers the dilemma</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-argument-at-its-strongest"} -->
<h2 class="wp-block-heading" id="the-argument-at-its-strongest">The argument at its strongest</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The dilemma draws on a group of verses. The Qur’an says that God sent down the Book ‘confirming what was before it’, as He had sent down the Torah and the Gospel as guidance for the people.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>It says that God gave Jesus the Gospel, ‘in which was guidance and light’, and tells the people of the Gospel to judge by what God has revealed in it.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> It tells the People of the Scripture that they stand on nothing until they uphold the Torah and the Gospel.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> And it tells the Prophet that if he is in doubt about what has been revealed to him, he should ask those who have been reading the scripture before him.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>From these verses proponents build three premises: that the Qur’an treats the Torah and Gospel of the seventh century as authoritative; that the Bible of the seventh century is, by the manuscript evidence, essentially the Bible of today; and that this Bible contradicts the Qur’an on the divinity of Christ and on the crucifixion.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Each of the three can be tested.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="dilemma-bible-altar" alt="An open Bible on a wooden altar" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-confirming-means"} -->
<h2 class="wp-block-heading" id="what-confirming-means">What {Q}confirming{Q} means</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The word the verses use for the Qur’an’s relation to earlier scripture is <em>muṣaddiq</em> (<span lang="ar" dir="rtl">مُصَدِّق</span>, confirming, declaring true). The same passage that the dilemma quotes goes on to give the Qur’an a second title: it is sent down ‘confirming that which preceded it of the Scripture and as a criterion over it’, <em>muhayminan ʿalayhi</em> (<span lang="ar" dir="rtl">مُهَيْمِنًا عَلَيْهِ</span>, a guardian over it).<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Ibn ʿAbbās, the Prophet’s cousin, explained the word as trustee: the Qur’an is trustee over every scripture before it.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> The early exegete al-Ṭabarī drew the consequence: whatever in the earlier books agrees with the Qur’an is true, and whatever disagrees with it is false.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The confirmation the dilemma relies on is therefore a confirmation under judgement. The Qur’an affirms that God revealed the Torah and the Gospel, affirms the truths that remain in the scriptures of Jews and Christians, and claims the right to say which parts those are. The first premise, that the Qur’an endorses the seventh-century text as it stood, reads only half of the verse on which it depends.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"which-gospel"} -->
<h2 class="wp-block-heading" id="which-gospel">Which Gospel?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an speaks of one Gospel, the <em>Injīl</em> (<span lang="ar" dir="rtl">إِنجِيل</span>), which God ‘gave’ to Jesus. The New Testament contains four Gospels, each bearing the name of a later writer, and one of them opens by explaining that its author compiled his account from what had been handed down by eyewitnesses.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup> The dilemma assumes that the Injīl of the Qur’an is simply the four Gospels of the Christian canon. That identification is the Christian reading of the Qur’an, and the Qur’an does not make it. On the Muslim reading, the Injīl is the revelation given to Jesus, which the four Gospels preserve in part, together with much that was written about him by others.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-quran-already-speaks-of-alteration"} -->
<h2 class="wp-block-heading" id="the-quran-already-speaks-of-alteration">The Qur’an already speaks of alteration</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The dilemma presents the Muslim charge of corruption as a later excuse that the Qur’an itself does not support. The Qur’an says otherwise, in the same period it was revealed.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>It condemns those who write scripture with their own hands and then say it is from God; it describes a party among the People of the Book who twist the scripture with their tongues so that it may be taken for scripture; and it says that some of them distort words from their proper places and have forgotten a portion of what they were reminded of.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> The Qur’an that confirms is the same Qur’an that corrects, and it does both in the seventh century. There is no contradiction for the Muslim to escape: the Qur’an never claimed that every text in the hands of its hearers was intact.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Read this way, the verses the dilemma cites fall into place. The people of the Gospel are told to judge by what God has revealed in it: by the truths that remain there, such as the oneness of God and the coming of a prophet described in their own scriptures.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup> And the verse about asking those who read the scripture concerned, for many classical exegetes, the Prophet’s own description in their books; others held that the Prophet neither doubted nor asked, and that the verse addresses his hearers through him.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="dilemma-alexandrinus" alt="A page of Codex Alexandrinus, a fifth-century Greek Bible, from the facsimile of 1879 to 1883" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-bible-of-the-seventh-century"} -->
<h2 class="wp-block-heading" id="the-bible-of-the-seventh-century">The Bible of the seventh century</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The second premise, that the Bible of the seventh century is essentially the Bible of today, turns against the argument once it is examined. The Bible of the seventh century already contained passages that Christian scholars now recognise as later additions.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>The last twelve verses of Mark are absent from the two oldest complete Greek Bibles, Codex Vaticanus and Codex Sinaiticus; Eusebius and Jerome both knew that most Greek copies of their day lacked them, and most New Testament scholars regard them as a second-century addition.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup> Many modern Bibles print a note that the earliest manuscripts lack the story of the woman taken in adultery.<sup class="abr-fn"><a href="#note-16" id="ref-16">16</a></sup> A Bible that had grown by the seventh century is exactly the kind of text over which the Qur’an claims the right of a guardian.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-verse-that-answers-the-dilemma"} -->
<h2 class="wp-block-heading" id="the-verse-that-answers-the-dilemma">The verse that answers the dilemma</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The whole question is settled by the verse that follows the passage the dilemma quotes most often:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَأَنزَلْنَآ إِلَيْكَ ٱلْكِتَـٰبَ بِٱلْحَقِّ مُصَدِّقًا لِّمَا بَيْنَ يَدَيْهِ مِنَ ٱلْكِتَـٰبِ وَمُهَيْمِنًا عَلَيْهِ ۖ فَٱحْكُم بَيْنَهُم بِمَآ أَنزَلَ ٱللَّهُ ۖ وَلَا تَتَّبِعْ أَهْوَآءَهُمْ عَمَّا جَآءَكَ مِنَ ٱلْحَقِّ ۚ لِكُلٍّ جَعَلْنَا مِنكُمْ شِرْعَةً وَمِنْهَاجًا ۚ وَلَوْ شَآءَ ٱللَّهُ لَجَعَلَكُمْ أُمَّةً وَٰحِدَةً وَلَـٰكِن لِّيَبْلُوَكُمْ فِى مَآ ءَاتَىٰكُمْ ۖ فَٱسْتَبِقُوا۟ ٱلْخَيْرَٰتِ ۚ إِلَى ٱللَّهِ مَرْجِعُكُمْ جَمِيعًا فَيُنَبِّئُكُم بِمَا كُنتُمْ فِيهِ تَخْتَلِفُونَ ٤٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And We have revealed to you, [O Muḥammad], the Book [i.e., the Qur’ān] in truth, confirming that which preceded it of the Scripture and as a criterion over it. So judge between them by what Allāh has revealed and do not follow their inclinations away from what has come to you of the truth. To each of you We prescribed a law and a method. Had Allāh willed, He would have made you one nation [united in religion], but [He intended] to test you in what He has given you; so race to [all that is] good. To Allāh is your return all together, and He will [then] inform you concerning that over which you used to differ.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 5:48<sup class="abr-fn"><a href="#note-17" id="ref-17">17</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The dilemma quotes the Qur’an as a witness to the Bible and stops before the verse that explains what kind of witness it is. The Qur’an confirms and guards at once: it declares true what God revealed to Moses and to Jesus, and it stands over the texts that later carried that revelation as the criterion that separates what remains of it from what was added. A dilemma needs two horns, and each of these rests on a premise the Qur’an rejects. The Muslim can hold without contradiction that God gave Jesus the Gospel, that the Christian scriptures preserve some of it, and that the Qur’an is the judge of which parts those are.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/reference/comparisons/islamic-dilemma/">What is the Islamic Dilemma?</a>, <a href="/journal/transmission-of-scripture/">The preservation and transmission of scripture</a>, <a href="/journal/bible-quran-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="https://themuslimapologist.online/articles/the-islamic-dilemma/">The Islamic Dilemma, refuted</a> (The Muslim Apologist).</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the Islamic Dilemma</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">“The Islamic Dilemma,” Hold Fast Apologetics, 2 March 2026; “The Islamic Dilemma: A Scholarly Breakdown by Rudolph P. Boshoff,” Ad Lucem Ministries, 2 October 2025. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">“What is the ‘Islamic Dilemma’?,” The Islamic Dilemma (islamicdilemma.com). <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 3:3-4. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur’an 5:46-47. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 5:68. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Qur’an 10:94. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">“The Islamic Dilemma: The Quran, the Bible, and a Two-Horned Trap,” Apologia Daily, 28 June 2026. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Qur’an 5:48. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Ṣaḥīḥ al-Bukhārī, Book of the Virtues of the Qur’an, chapter 1, the comment of Ibn ʿAbbās on <em>al-muhaymin</em>. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Ibn Kathīr, <em>Tafsīr al-Qur’ān al-ʿAẓīm</em>, on Qur’an 5:48, quoting Ibn Jarīr al-Ṭabarī and the reports from Ibn ʿAbbās. <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Luke 1:1-4. <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">Qur’an 2:79; 3:78; 5:13. <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Qur’an 7:157; cf. Mark 12:29. <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">Waleed Blyth, note to Qur’an 10:94, <em>The Qur’an: English translation</em>, Quranenc.com, citing al-Ṭabarī, Ibn ʿAṭiyyah and Ibn Kathīr, and al-Wāḥidī, al-Baghawī and Ibn ʿĀshūr. <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-15">“‘The Earliest Manuscripts Do Not Have …’: How to Preach Mark 16 and John 8,” Logos. <a href="#ref-15" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-16">New International Version, note at John 7:53-8:11. <a href="#ref-16" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-17">Qur'an 5:48, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-17" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:islamic-dilemma-reddit', 'photo' => array( 'name' => 'reddit-study-group', 'alt' => 'Islamic Dilemma Reddit questions answered: a group of readers studying a large book together' ), 'type' => 'post', 'slug' => 'islamic-dilemma-reddit', 'title' => 'The Islamic Dilemma: answers for Reddit readers',
			'excerpt' => 'Short, sourced answers to the questions people search for about the Islamic Dilemma: Surah 5:46, 5:47, 10:94, and whether the Qur’an or the Bible has been changed.', 'description' => 'Islamic Dilemma Reddit questions answered: Surah 5:46, 5:47, 10:94, and whether scripture changed. Read the answers.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 82, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Islamic Dilemma Reddit threads raise the same questions again and again; here are the answers. Readers who search for the Islamic Dilemma often add the word Reddit to their search, looking for a plain, direct answer. This page is for them. It answers, briefly and with sources, the questions people actually type into search engines about the argument; the full treatment is in <a href="/journal/the-islamic-dilemma/">The Islamic Dilemma: the argument and the answer</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#what-is-the-islamic-dilemma">What is the Islamic Dilemma?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#is-the-islamic-dilemma-true">Is the Islamic Dilemma true?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-does-surah-5-46-say">What does Surah 5:46 say?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#why-does-the-quran-tell-christians-to-judge-by-the-gospel">Why does the Qur’an tell Christians to judge by the Gospel?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#did-muhammad-doubt-the-quran">Did Muhammad doubt the Qur’an? (Surah 10:94)</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#has-the-quran-been-changed">Has the Qur’an been changed?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#has-the-bible-been-changed">Has the Bible been changed?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#where-can-i-read-a-full-rebuttal">Where can I read a full rebuttal?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-brief">Islamic Dilemma Reddit questions in brief</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"what-is-the-islamic-dilemma"} -->
<h2 class="wp-block-heading" id="what-is-the-islamic-dilemma">What is the Islamic Dilemma?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>An argument popularised by the Christian apologist David Wood. The Qur’an affirms the Torah and the Gospel; if the Gospel is God’s word, Islam is false for contradicting it, and if it is not, Islam is false for affirming it.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> See <a href="/reference/comparisons/islamic-dilemma/">What is the Islamic Dilemma?</a> for the verses it cites.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"is-the-islamic-dilemma-true"} -->
<h2 class="wp-block-heading" id="is-the-islamic-dilemma-true">Is the Islamic Dilemma true?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Only if the Qur’an vouches for every text in the hands of Jews and Christians. It does not. The same passage the argument quotes calls the Qur’an a guardian and criterion over earlier scripture, and the Qur’an elsewhere speaks of people who wrote scripture with their own hands and distorted words from their places.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Confirming a revelation and judging the texts that carry it are two parts of one claim, so the dilemma’s two horns do not close.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-does-surah-5-46-say"} -->
<h2 class="wp-block-heading" id="what-does-surah-5-46-say">What does Surah 5:46 say?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>That God sent Jesus confirming the Torah before him, and gave him the Gospel, ‘in which was guidance and light’.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> The verse speaks of the Gospel God gave to Jesus. The four Gospels of the New Testament were written about him by others, one of whose authors says he compiled it from earlier accounts.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"why-does-the-quran-tell-christians-to-judge-by-the-gospel"} -->
<h2 class="wp-block-heading" id="why-does-the-quran-tell-christians-to-judge-by-the-gospel">Why does the Qur’an tell Christians to judge by the Gospel?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Surah 5:47 tells the people of the Gospel to judge by ‘what God has revealed therein’: by the truths of revelation that remain in their scripture, among them the oneness of God and the prophet the Qur’an says they find described in it.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The next verse makes the Qur’an the criterion of what those truths are.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"did-muhammad-doubt-the-quran"} -->
<h2 class="wp-block-heading" id="did-muhammad-doubt-the-quran">Did Muhammad doubt the Qur’an? (Surah 10:94)</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The verse is conditional: if you are in doubt, ask those who read the scripture before you. Many classical exegetes took it to concern the Prophet’s description in the earlier books; others held that he neither doubted nor asked, and that the verse addresses his hearers through him.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"has-the-quran-been-changed"} -->
<h2 class="wp-block-heading" id="has-the-quran-been-changed">Has the Qur’an been changed?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The manuscript evidence places the Qur’an’s written text very close to the Prophet’s lifetime. Two leaves held by the University of Birmingham, containing parts of chapters 18 to 20, were radiocarbon dated in 2015 to between 568 and 645 CE with 95.4 per cent probability.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Muslim scholarship has always recorded the recognised variant readings of the text, the <em>qirāʾāt</em> (<span lang="ar" dir="rtl">قِرَاءَات</span>, readings), openly. See <a href="/journal/transmission-of-scripture/">The preservation and transmission of scripture</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"has-the-bible-been-changed"} -->
<h2 class="wp-block-heading" id="has-the-bible-been-changed">Has the Bible been changed?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christian scholars themselves identify later additions. The last twelve verses of Mark are missing from the oldest complete Greek Bibles, and most New Testament scholars regard them as a second-century addition.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Many modern Bibles note that the earliest manuscripts lack the story of the woman taken in adultery.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"where-can-i-read-a-full-rebuttal"} -->
<h2 class="wp-block-heading" id="where-can-i-read-a-full-rebuttal">Where can I read a full rebuttal?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Start with <a href="/journal/the-islamic-dilemma/">The Islamic Dilemma: the argument and the answer</a>, and see also <a href="https://themuslimapologist.online/articles/the-islamic-dilemma/">The Islamic Dilemma, refuted</a> at The Muslim Apologist.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-brief"} -->
<h2 class="wp-block-heading" id="in-brief">Islamic Dilemma Reddit questions in brief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Islamic Dilemma Reddit threads usually turn on three questions: whether the Qur’an confirms the Bible as it stands, whether the Gospel it names is the four Gospels, and whether the Qur’an itself speaks of alteration. The answers above take each in turn, and the full article sets out the argument in detail.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-islamic-dilemma/">The Islamic Dilemma: the argument and the answer</a>, <a href="/reference/comparisons/islamic-dilemma/">What is the Islamic Dilemma?</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">“What is the ‘Islamic Dilemma’?,” The Islamic Dilemma (islamicdilemma.com). <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur’an 5:48; 2:79; 5:13. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 5:46, trans. Saheeh International. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Luke 1:1-4. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 5:47; 7:157; cf. Mark 12:29. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Waleed Blyth, note to Qur’an 10:94, Quranenc.com, citing al-Ṭabarī, Ibn ʿAṭiyyah, Ibn Kathīr, al-Wāḥidī, al-Baghawī and Ibn ʿĀshūr. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">“Birmingham Qur’an manuscript dated among the oldest in the world,” University of Birmingham, 22 July 2015. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">“‘The Earliest Manuscripts Do Not Have …’: How to Preach Mark 16 and John 8,” Logos. <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">New International Version, note at John 7:53-8:11. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:judaism-vs-christianity-reddit', 'photo' => array( 'name' => 'reddit-jerusalem-rooftops', 'alt' => 'Judaism vs Christianity: the rooftops of the Old City of Jerusalem' ), 'type' => 'post', 'slug' => 'judaism-vs-christianity-reddit', 'title' => 'Judaism vs Christianity: answers for Reddit readers',
			'excerpt' => 'Are Judaism and Christianity the same religion? What divides them, which Bible each reads, and whether Christians keep the law: short, sourced answers.', 'description' => 'Judaism vs Christianity, answered for Reddit readers: the main differences, the Bible and the law. Read the answers.', 'categories' => array( 'religion', 'history' ), 'days_ago' => 0, 'since' => 82, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Judaism vs Christianity is one of the commonest comparisons readers ask about. People comparing Judaism and Christianity often add Reddit to their search in the hope of a plain, straight answer. This page gives short, sourced answers to the questions they ask most. For the longer comparison, see <a href="/reference/comparisons/#judaism-and-christianity">Comparative studies</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#are-judaism-and-christianity-the-same">Are Judaism and Christianity the same religion?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-is-the-main-difference">What is the main difference between Judaism and Christianity?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#do-jews-and-christians-read-the-same-bible">Do Jews and Christians read the same Bible?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#do-christians-keep-jewish-law">Do Christians keep the Jewish law?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#how-do-they-see-each-other">How does each see the other?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-brief">Judaism vs Christianity in brief</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"are-judaism-and-christianity-the-same"} -->
<h2 class="wp-block-heading" id="are-judaism-and-christianity-the-same">Are Judaism and Christianity the same religion?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>No. They share a scripture and a history, and Christianity began as a movement within Judaism, but they separated over the first four centuries and became two religions with different beliefs about God, the Messiah and the law. See <a href="/journal/the-parting-of-the-ways/">The parting of the ways</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-is-the-main-difference"} -->
<h2 class="wp-block-heading" id="what-is-the-main-difference">What is the main difference between Judaism and Christianity?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jesus. Christians believe that he is the Messiah and the Son of God, one person of the Trinity, who died and rose again.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Jews do not accept him as the Messiah; they await a Messiah still to come, a human king of David’s line who will restore Israel and bring peace, and they hold that God is one and indivisible.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"do-jews-and-christians-read-the-same-bible"} -->
<h2 class="wp-block-heading" id="do-jews-and-christians-read-the-same-bible">Do Jews and Christians read the same Bible?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In part. The Jewish scripture, the Tanakh, is the Christian Old Testament, though the books are arranged differently, and Catholic and Orthodox Bibles include further books not in the Hebrew canon. Christians add the New Testament, which Judaism does not accept as scripture. See <a href="/reference/sacred-texts/tanakh/">The Tanakh</a> and <a href="/reference/sacred-texts/bible/">The Bible</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"do-christians-keep-jewish-law"} -->
<h2 class="wp-block-heading" id="do-christians-keep-jewish-law">Do Christians keep the Jewish law?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Most do not. The apostles at Jerusalem freed Gentile converts from circumcision and most of the law of Moses, requiring only that they avoid food offered to idols, blood, what is strangled and sexual immorality.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Observant Jews live by the 613 commandments of the Torah as the rabbis interpreted them.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> See <a href="/journal/religious-law/">Religious law in the Abrahamic traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-do-they-see-each-other"} -->
<h2 class="wp-block-heading" id="how-do-they-see-each-other">How does each see the other?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christianity holds that God’s covenant with Israel was fulfilled and opened to all nations in Christ, though churches differ on what that means for the Jewish people today. Judaism regards Christianity as a separate religion that grew from Jewish roots. The Qur’an, for its part, honours the prophets of Israel and Jesus as Messiah, and calls on both communities to return to the pure monotheism of Abraham.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-brief"} -->
<h2 class="wp-block-heading" id="in-brief">Judaism vs Christianity in brief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism vs Christianity comes down to one figure: Christians hold Jesus to be the Messiah and the Son of God, while Jews await a Messiah still to come and hold that God is one and indivisible. Both read the Hebrew Bible, and they differ on the law, the covenant and the New Testament.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/reference/comparisons/">Comparative studies</a>, <a href="/journal/the-parting-of-the-ways/">The parting of the ways</a>, <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">The Nicene Creed (381); 1 Corinthians 15:3-4. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Deuteronomy 6:4; Maimonides, <em>Mishneh Torah</em>, Laws of Kings 11-12. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Acts 15:28-29. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Babylonian Talmud, Makkot 23b. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5"><a href="https://quran.com/3/45">Qur’an 3:45</a>; 3:64-67. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-messiah-in-three-traditions', 'photo' => array( 'name' => 'ai-messiah-oil', 'alt' => 'The Messiah: olive oil in a glass jar, the oil of anointing' ), 'type' => 'post', 'slug' => 'the-messiah-in-three-traditions', 'title' => 'The Messiah in Judaism, Christianity and Islam',
			'excerpt' => 'What does Messiah mean? Mashiach, Christos and al-Masīḥ: the anointed one in Judaism, Christianity and Islam, and the Qur’an’s account of Jesus as Messiah.', 'description' => 'What does Messiah mean? Mashiach, Christos and al-Masih in Judaism, Christianity and Islam. Read the answer.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Few titles have carried as much hope as ‘Messiah’. Jews await the Messiah, Christians confess Jesus as the Christ, and Muslims call Jesus <em>al-Masīḥ</em> (<span lang="ar" dir="rtl">ٱلْمَسِيح</span>, the Messiah). The word is shared; its meaning differs in each tradition, and the Islamic understanding restores it to its plainest sense.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-anointed-one">The anointed one</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#three-understandings">Three understandings</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-messiah-in-islam">The Messiah in Islam</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-anointed-one"} -->
<h2 class="wp-block-heading" id="the-anointed-one">The anointed one</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Hebrew <em>mashiach</em> means ‘anointed’. In the Hebrew Bible kings and priests were anointed with oil when they took office, and David, sparing Saul’s life, would not raise his hand against ‘the Lord’s anointed’.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The Greek translation of the word is <em>christos</em>; the Gospel of John explains that ‘Messias’ is, being interpreted, the Christ.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Arabic <em>masīḥ</em> belongs to the same Semitic root, <em>m-s-ḥ</em>, to wipe or anoint.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"three-understandings"} -->
<h2 class="wp-block-heading" id="three-understandings">Three understandings</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism awaits a Messiah who is fully human: a king of David’s line who will gather Israel and bring an age of peace.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Christianity holds that Jesus is that Messiah and more, the divine Son of God. The Qur’an gives Jesus the title from the moment of the annunciation, and in the same breath calls him the son of Mary, a word from God, honoured in this world and the next.</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">إِذْ قَالَتِ ٱلْمَلَـٰٓئِكَةُ يَـٰمَرْيَمُ إِنَّ ٱللَّهَ يُبَشِّرُكِ بِكَلِمَةٍ مِّنْهُ ٱسْمُهُ ٱلْمَسِيحُ عِيسَى ٱبْنُ مَرْيَمَ وَجِيهًا فِى ٱلدُّنْيَا وَٱلْـَٔاخِرَةِ وَمِنَ ٱلْمُقَرَّبِينَ ٤٥</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">[And mention] when the angels said, "O Mary, indeed Allāh gives you good tidings of a word from Him, whose name will be the Messiah, Jesus, the son of Mary - distinguished in this world and the Hereafter and among those brought near [to Allāh].</p>
<!-- /wp:paragraph -->
<cite>Qur’an 3:45<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"the-messiah-in-islam"} -->
<h2 class="wp-block-heading" id="the-messiah-in-islam">The Messiah in Islam</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In the Qur’an the title never lifts Jesus above humanity. The Messiah, son of Mary, it says, was no more than a messenger, like the messengers before him; he and his mother both ate food.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The Qur’an also denies that his enemies killed or crucified him, and Muslims await his return before the end of time. The title is the anointing of a chosen servant of God, which is the meaning the word held for David and for Israel’s kings.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This is the verse’s gift to the other traditions. It keeps the Jewish meaning of the word, a human being anointed by God, and it keeps the Christian conviction that Jesus is that anointed one. What it removes is the claim that the anointed one is God. <em>Al-Masīḥ</em> in the Qur’an is exactly what the word says.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/mary-across-the-traditions/">Mary across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">1 Samuel 24:6; cf. Exodus 29:7; 1 Samuel 16:13. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">John 1:41. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Maimonides, <em>Mishneh Torah</em>, Laws of Kings and Wars 11-12. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><a href="https://quran.com/3/45">Qur’an 3:45</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 5:75, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:ishmael-in-the-abrahamic-traditions', 'photo' => array( 'name' => 'ai-ishmael-desert', 'alt' => 'Ishmael: palm trees in the desert near Tabuk in north-western Arabia' ), 'type' => 'post', 'slug' => 'ishmael', 'title' => 'Ishmael in the Abrahamic traditions',
			'excerpt' => 'Abraham’s firstborn son in Genesis and the Qur’an: the promise to Ishmael, the Kaaba, and why most Muslim scholars hold that he was the son of the sacrifice.', 'description' => 'Ishmael in Genesis and the Qur’an: the firstborn son, the Kaaba and the sacrifice. Read his story here.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Ishmael, the firstborn son of Abraham, is honoured in all three of the large Abrahamic traditions, but only in Islam does he stand at the centre of the story. Muslims trace the Prophet Muhammad’s lineage to him, and the rites of the Hajj remember him, his mother Hagar and his father.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#ishmael-in-genesis">In Genesis</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#ishmael-in-the-quran">Ishmael in the Qur’an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-son-of-the-sacrifice">The son of the sacrifice</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"ishmael-in-genesis"} -->
<h2 class="wp-block-heading" id="ishmael-in-genesis">In Genesis</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Genesis tells how Hagar bore Ishmael to Abraham when Abraham was eighty-six; how God promised to bless Ishmael, make him fruitful and make him a great nation; and how Ishmael, with Isaac, buried their father.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> It names his twelve sons as princes of their tribes, among them Kedar, whose descendants became the Arabs of the north.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> See <a href="/journal/who-was-kedar/">Kedar, the Arabs and the prophets</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ishmael-in-the-quran"} -->
<h2 class="wp-block-heading" id="ishmael-in-the-quran">Ishmael in the Qur’an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an calls Ishmael, <em>Ismāʿīl</em> (<span lang="ar" dir="rtl">إِسْمَاعِيل</span>), a prophet and messenger, true to his promise, who enjoined prayer and charity on his people.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> With Abraham he raised the foundations of the Kaaba, and together they prayed that God would send a messenger from among their descendants.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Muslims see that prayer answered in the Prophet Muhammad.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-son-of-the-sacrifice"} -->
<h2 class="wp-block-heading" id="the-son-of-the-sacrifice">The son of the sacrifice</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Genesis names Isaac as the son Abraham was commanded to offer, yet calls him ‘your only son’, a description that fits only Ishmael, who was the only son for fourteen years.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The Qur’an leaves the son unnamed in the account of the sacrifice, and announces Isaac only afterwards, as a further blessing; most Muslim scholars therefore hold that the son was Ishmael.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">فَلَمَّا بَلَغَ مَعَهُ ٱلسَّعْىَ قَالَ يَـٰبُنَىَّ إِنِّىٓ أَرَىٰ فِى ٱلْمَنَامِ أَنِّىٓ أَذْبَحُكَ فَٱنظُرْ مَاذَا تَرَىٰ ۚ قَالَ يَـٰٓأَبَتِ ٱفْعَلْ مَا تُؤْمَرُ ۖ سَتَجِدُنِىٓ إِن شَآءَ ٱللَّهُ مِنَ ٱلصَّـٰبِرِينَ ١٠٢</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And when he reached with him [the age of] exertion, he said, "O my son, indeed I have seen in a dream that I [must] sacrifice you, so see what you think." He said, "O my father, do as you are commanded. You will find me, if Allāh wills, of the steadfast."</p>
<!-- /wp:paragraph -->
<cite>Qur’an 37:102<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse shows why Islam honours Ishmael so highly. The son consents: ‘do as you are commanded; you will find me, if Allah wills, of the steadfast.’ His submission is the same <em>islām</em> that the religion bears as its name, and Muslims remember it every year at the sacrifice of the Hajj.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-stations-of-the-hajj/">The stations of the Hajj</a>, <a href="/journal/abrahamic-family-tree/">The Abrahamic family tree</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Genesis 16:15-16; 17:20; 25:9. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Genesis 25:13-16. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3"><a href="https://quran.com/19/54">Qur’an 19:54</a>-55, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur’an 2:127-129, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Genesis 22:2; 16:16; 21:5. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Qur’an 37:101-113, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Qur’an 37:102, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:is-allah-the-god-of-the-bible', 'photo' => array( 'name' => 'ai-allah-calligraphy', 'alt' => 'Allah: arabic calligraphy on the walls of a mosque' ), 'type' => 'post', 'slug' => 'is-allah-the-god-of-the-bible', 'title' => 'Is Allah the God of the Bible?',
			'excerpt' => 'Is Allah the same God as the God of the Bible? The Arabic word, the Arabic Bible, and the Qur’an’s declaration that the God of Jews, Christians and Muslims is one.', 'description' => 'Is Allah the same God as the God of the Bible? The word, its history and the Qur’an’s answer. Read on.', 'categories' => array( 'theology', 'scripture' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Is Allah the same God as the God of the Bible? The question is asked in good faith and bad, and it has a clear answer in language, in history and in the Qur’an itself.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-word">The word</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-god-of-abraham">The God of Abraham</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-same-god-described-differently">The same God, described differently</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-word"} -->
<h2 class="wp-block-heading" id="the-word">The word</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><em>Allāh</em> (<span lang="ar" dir="rtl">ٱللَّه</span>) is the Arabic word for God, formed from the article <em>al-</em> and <em>ilāh</em>, a god, and related to the Hebrew <em>Elohim</em> and the Aramaic <em>Alaha</em>. Arabic-speaking Jews and Christians have always used it: the standard Arabic Bible opens with the words that in the beginning <em>Allāh</em> created the heavens and the earth.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-god-of-abraham"} -->
<h2 class="wp-block-heading" id="the-god-of-abraham">The God of Abraham</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an tells Muslims how to speak to Jews and Christians: in the best manner, affirming what was revealed to both, and declaring that ‘our God and your God is one’.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> It invites them to a common word: to worship none but God and to set up no partner beside Him.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> On this view there is one God, the God of Abraham, who spoke to Moses and to Jesus and finally to Muhammad.</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">۞ وَلَا تُجَـٰدِلُوٓا۟ أَهْلَ ٱلْكِتَـٰبِ إِلَّا بِٱلَّتِى هِىَ أَحْسَنُ إِلَّا ٱلَّذِينَ ظَلَمُوا۟ مِنْهُمْ ۖ وَقُولُوٓا۟ ءَامَنَّا بِٱلَّذِىٓ أُنزِلَ إِلَيْنَا وَأُنزِلَ إِلَيْكُمْ وَإِلَـٰهُنَا وَإِلَـٰهُكُمْ وَٰحِدٌ وَنَحْنُ لَهُۥ مُسْلِمُونَ ٤٦</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And do not argue with the People of the Scripture except in a way that is best, except for those who commit injustice among them, and say, "We believe in that which has been revealed to us and revealed to you. And our God and your God is one; and we are Muslims [in submission] to Him."</p>
<!-- /wp:paragraph -->
<cite>Qur’an 29:46<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"the-same-god-described-differently"} -->
<h2 class="wp-block-heading" id="the-same-god-described-differently">The same God, described differently</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christians who deny that Muslims worship the God of the Bible usually mean that Muslims reject the Trinity. That is a disagreement about what God is like, and Jews and Christians have it too: Judaism also rejects the Trinity, yet few would say that Jews worship another god. The Qur’an’s description of God, one, eternal, neither begetting nor begotten, stands closest of all to the first commandment of the Torah and to the Shema that Jesus himself quoted as the greatest commandment.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The verse therefore answers the question from the Qur’an’s side with a plain yes. Allah is the God of Abraham, and the Qur’an asks the people of the earlier scriptures only to worship Him alone.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/abrahamic-monotheism/">Monotheism in the Abrahamic religions</a>, <a href="/reference/faq/#do-they-worship-the-same-god">Do they worship the same God?</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Allah</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Genesis 1:1, Arabic Bible, Van Dyck translation (Beirut, 1865). <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2"><a href="https://quran.com/29/46">Qur’an 29:46</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 3:64, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur’an 29:46, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Deuteronomy 6:4; Mark 12:29; Qur’an 112:1-4. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-gospel-of-barnabas', 'photo' => array( 'name' => 'ai-barnabas-parchment', 'alt' => 'The Gospel of Barnabas: medieval calligraphy on parchment' ), 'type' => 'post', 'slug' => 'the-gospel-of-barnabas', 'title' => 'The Gospel of Barnabas: what Muslims should know',
			'excerpt' => 'The Gospel of Barnabas echoes the Islamic account of Jesus, but its manuscripts and text are late medieval. Why the Qur’an’s account of Jesus does not depend on it.', 'description' => 'The Gospel of Barnabas: its manuscripts, its date, and why Muslims do not need it. Read the honest answer.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Gospel of Barnabas presents a life of Jesus close to the Islamic account: Jesus denies that he is the Son of God, is spared the cross, and foretells the coming of Muhammad by name. It has been widely circulated among Muslims. An honest account of its origins serves Muslims better than an uncritical one, and the Islamic case for Jesus does not depend on it.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-manuscripts">The manuscripts</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-date-of-the-text">The date of the text</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-muslims-need">What Muslims need</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-manuscripts"} -->
<h2 class="wp-block-heading" id="the-manuscripts">The manuscripts</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Two manuscripts are known. The Italian one, held in the Austrian National Library in Vienna, is dated by the watermark of its paper to about 1600; a Spanish manuscript, reported by George Sale in 1734, survives in part in an eighteenth-century copy. The earliest reference to a Gospel of Barnabas that matches this text is in a Morisco manuscript of about 1634.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-date-of-the-text"} -->
<h2 class="wp-block-heading" id="the-date-of-the-text">The date of the text</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The text itself points to late medieval Europe. It speaks of a jubilee every hundred years, a practice of the Latin Church only in the first half of the fourteenth century, and the biblical scholar Jan Joosten concludes from this and other details that it was composed then.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Other Muslim scholars have long doubted its authenticity for the same reasons.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-muslims-need"} -->
<h2 class="wp-block-heading" id="what-muslims-need">What Muslims need</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muslims do not need the Gospel of Barnabas. The Qur’an gives its own account of Jesus: a prophet and the Messiah, born of the virgin Mary, who was neither killed nor crucified.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> It gives its own ground for that account, a revelation that stands as guardian over earlier scripture, and it points to the Prophet’s description in the scriptures of the People of the Book.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> A medieval text that echoes the Qur’an adds nothing to that witness, and relying on it hands critics an easy target.</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَقَوْلِهِمْ إِنَّا قَتَلْنَا ٱلْمَسِيحَ عِيسَى ٱبْنَ مَرْيَمَ رَسُولَ ٱللَّهِ وَمَا قَتَلُوهُ وَمَا صَلَبُوهُ وَلَـٰكِن شُبِّهَ لَهُمْ ۚ وَإِنَّ ٱلَّذِينَ ٱخْتَلَفُوا۟ فِيهِ لَفِى شَكٍّ مِّنْهُ ۚ مَا لَهُم بِهِۦ مِنْ عِلْمٍ إِلَّا ٱتِّبَاعَ ٱلظَّنِّ ۚ وَمَا قَتَلُوهُ يَقِينًۢا ١٥٧</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And [for] their saying, "Indeed, we have killed the Messiah, Jesus the son of Mary, the messenger of Allāh." And they did not kill him, nor did they crucify him; but [another] was made to resemble him to them. And indeed, those who differ over it are in doubt about it. They have no knowledge of it except the following of assumption. And they did not kill him, for certain.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 4:157<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse makes the point. The Qur’an’s account of the end of Jesus’s life rests on revelation alone, and it asks to be believed on that authority. It needs no later gospel to support it.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/transmission-of-scripture/">How scripture was preserved</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on the Gospel of Barnabas</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Jan Joosten, “The Date and Provenance of the Gospel of Barnabas,” <em>Journal of Theological Studies</em> 61 (2010), on the Vienna manuscript (Cod. 2662 Eug.) and the Spanish manuscript first signalled by George Sale in 1734; Richard Bartholomew, “Novel Promotes Gospel of Barnabas Conspiracy Theory,” 28 December 2012, on the Morisco manuscript of 1634. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Jan Joosten, “The Date and Provenance of the Gospel of Barnabas,” <em>Journal of Theological Studies</em> 61 (2010), as summarised in “Why the Gospel of Barnabas is a Medieval Fake,” Catholic Answers. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">“Is There a ‘Gospel of Barnabas’?,” John Ankerberg Show, citing Jan Slomp, p. 68. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><a href="https://quran.com/4/157">Qur’an 4:157</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 7:157, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Qur’an 4:157, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:what-the-quran-says-about-the-bible', 'photo' => array( 'name' => 'ai-torah-scroll', 'alt' => 'What the Qur’an says about the Bible: a reader following the text of a Torah scroll' ), 'type' => 'post', 'slug' => 'what-the-quran-says', 'title' => 'What the Qur’an says about the Torah, Psalms and Gospel',
			'excerpt' => 'The Tawrah, the Zabur and the Injil: how the Qur’an honours the scriptures given to Moses, David and Jesus, and how it stands as their guardian.', 'description' => 'What the Qur’an says about the Bible: the Torah, Psalms and Gospel honoured as guidance and light. Read on.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>What the Qur’an says about the Bible is more generous than many expect. The Qur’an names three earlier scriptures: the <em>Tawrāh</em> (<span lang="ar" dir="rtl">ٱلتَّوْرَاة</span>, Torah) given to Moses, the <em>Zabūr</em> (<span lang="ar" dir="rtl">ٱلزَّبُور</span>, Psalms) given to David, and the <em>Injīl</em> (<span lang="ar" dir="rtl">ٱلْإِنجِيل</span>, Gospel) given to Jesus. It also speaks of the scrolls of Abraham and Moses.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Belief in all of them is an article of Muslim faith. Muslims therefore approach the Bible with respect and with care: respect for the revelation it carries, and care to distinguish that revelation from what the Qur’an says was added to it.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#guidance-and-light">Guidance and light</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#confirmation-and-guardianship">Confirmation and guardianship</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#in-brief">What the Qur’an says about the Bible, in brief</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"guidance-and-light"} -->
<h2 class="wp-block-heading" id="guidance-and-light">Guidance and light</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an describes the Torah as guidance and light, by which the prophets who submitted to God judged for the Jews, together with the rabbis and scholars entrusted with it.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> It says the same of the Gospel, and calls the Qur’an itself a confirmation of what came before it. No other scripture speaks of earlier revelations with such honour.</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">إِنَّآ أَنزَلْنَا ٱلتَّوْرَىٰةَ فِيهَا هُدًى وَنُورٌ ۚ يَحْكُمُ بِهَا ٱلنَّبِيُّونَ ٱلَّذِينَ أَسْلَمُوا۟ لِلَّذِينَ هَادُوا۟ وَٱلرَّبَّـٰنِيُّونَ وَٱلْأَحْبَارُ بِمَا ٱسْتُحْفِظُوا۟ مِن كِتَـٰبِ ٱللَّهِ وَكَانُوا۟ عَلَيْهِ شُهَدَآءَ ۚ فَلَا تَخْشَوُا۟ ٱلنَّاسَ وَٱخْشَوْنِ وَلَا تَشْتَرُوا۟ بِـَٔايَـٰتِى ثَمَنًا قَلِيلًا ۚ وَمَن لَّمْ يَحْكُم بِمَآ أَنزَلَ ٱللَّهُ فَأُو۟لَـٰٓئِكَ هُمُ ٱلْكَـٰفِرُونَ ٤٤</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Indeed, We sent down the Torah, in which was guidance and light. The prophets who submitted [to Allāh] judged by it for the Jews, as did the rabbis and scholars by that with which they were entrusted of the Scripture of Allāh, and they were witnesses thereto. So do not fear the people but fear Me, and do not exchange My verses for a small price [i.e., worldly gain]. And whoever does not judge by what Allāh has revealed - then it is those who are the disbelievers.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 5:44<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"confirmation-and-guardianship"} -->
<h2 class="wp-block-heading" id="confirmation-and-guardianship">Confirmation and guardianship</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an honours the earlier scriptures as revelation and also stands over them as guardian and criterion, and it speaks of those who changed words from their places.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Muslims therefore affirm that God revealed the Torah, the Psalms and the Gospel, and read the Bible that has come down as containing much of that revelation alongside later human writing. See <a href="/journal/the-islamic-dilemma/">The Islamic Dilemma answered</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The verse of the Torah shows the spirit of the whole. It praises the prophets who judged by the Torah, calls them those ‘who submitted’, and so counts them among the Muslims in the Qur’an’s sense of the word. Every revelation, on this view, came from one God and called to one submission.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Of the three, the Psalms receive the least attention, yet the Qur’an quotes them directly. It says that God wrote in the <em>Zabūr</em>, after the reminder, that the land is inherited by His righteous servants, words that answer closely to the Psalm promising that the righteous shall inherit the land and dwell in it for ever.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> It is one of the few passages of the Bible that the Qur’an echoes so closely, and Muslim commentators have long drawn attention to it as a sign of the continuity of revelation from David to Muhammad.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"in-brief"} -->
<h2 class="wp-block-heading" id="in-brief">What the Qur’an says about the Bible, in brief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>What the Qur’an says about the Bible is that God revealed the Torah to Moses, the Psalms to David and the Gospel to Jesus, all guidance and light; that it confirms them and stands as their guardian; and that some who held them changed words from their places.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-islamic-dilemma/">The Islamic Dilemma: the argument and the answer</a>, <a href="/reference/sacred-texts/">Sacred texts</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/3/3">Qur’an 3:3</a>; 4:163; 17:55; 5:46; 87:19. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur’an 5:44, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 5:44, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur’an 5:48; 5:13; 2:79. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 21:105, trans. Saheeh International, Quran.com; Psalm 37:29. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-kaaba', 'photo' => array( 'name' => 'ai-kaaba-aerial', 'alt' => 'Pilgrims around the Kaaba in the Great Mosque of Makkah, seen from above' ), 'type' => 'post', 'slug' => 'the-kaaba', 'title' => 'The Kaaba: who built it, and its history',
			'excerpt' => 'Who built the Kaaba? The Qur’an’s account of Abraham and Ishmael, and the history of the House from the Quraysh to the Umayyads.', 'description' => 'Who built the Kaaba? Abraham and Ishmael in the Qur’an, and the history of the House. Read the full story.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Kaaba in Makkah is the direction of every Muslim prayer and the centre of the Hajj. Muslims hold that it is the oldest house of worship dedicated to the one God.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#who-built-the-kaaba">Who built the Kaaba?</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-history-of-rebuilding">A history of rebuilding</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"who-built-the-kaaba"} -->
<h2 class="wp-block-heading" id="who-built-the-kaaba">Who built the Kaaba?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an calls it the first house established for mankind, at Bakkah, and tells how Abraham and Ishmael raised its foundations, praying that God would accept it from them.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> God showed Abraham its site and commanded him to purify it for those who circle it, stand, bow and prostrate.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَإِذْ يَرْفَعُ إِبْرَٰهِـۧمُ ٱلْقَوَاعِدَ مِنَ ٱلْبَيْتِ وَإِسْمَـٰعِيلُ رَبَّنَا تَقَبَّلْ مِنَّآ ۖ إِنَّكَ أَنتَ ٱلسَّمِيعُ ٱلْعَلِيمُ ١٢٧</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And [mention] when Abraham was raising the foundations of the House and [with him] Ishmael, [saying], "Our Lord, accept [this] from us. Indeed, You are the Hearing, the Knowing.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 2:127<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"a-history-of-rebuilding"} -->
<h2 class="wp-block-heading" id="a-history-of-rebuilding">A history of rebuilding</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The building has been rebuilt many times on its ancient foundations. The tribe of Quraysh rebuilt it in stone and wood during the Prophet’s lifetime, before his mission began. When the Prophet returned to Makkah in 630 he cleared it of idols and restored it to the worship of the one God. It was damaged by fire in 683, during a civil war, and rebuilt by ʿAbd Allāh ibn al-Zubayr on what he held to be Abraham’s dimensions; in 692 the caliph ʿAbd al-Malik restored the shape it had in the Prophet’s time.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The verse explains why every rebuilding kept to the old foundations. What Abraham and Ishmael laid was a prayer as much as a wall: ‘Our Lord, accept this from us.’ Muslims who pray toward the Kaaba five times a day join the prayer of its first builders.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-stations-of-the-hajj/">The stations of the Hajj</a>, <a href="/journal/ishmael/">Ishmael in the Abrahamic traditions</a>, <a href="/reference/places/#makkah">Makkah</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/3/96">Qur’an 3:96</a>; 2:127. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur’an 22:26, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 2:127, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">“Kaʿba,” Archnet, Aga Khan Trust for Culture; “A short history of the Kaaba,” The Royal Mint. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:saul-in-the-quran', 'photo' => array( 'name' => 'ai-saul-valley', 'alt' => 'Saul: a green valley among hills' ), 'type' => 'post', 'slug' => 'saul-in-the-quran', 'title' => 'Saul in the Qur’an: the story of Talut',
			'excerpt' => 'Who is Saul in the Qur’an? The story of Ṭālūt, Israel’s first king, his test at the river and David’s victory over Goliath, beside the account in 1 Samuel.', 'description' => 'Who is Saul in the Qur’an? The story of Talut, the river test and David’s victory. Read the story here.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Qur’an tells the story of Israel’s first king in a few verses of the chapter of the Cow. It calls him <em>Ṭālūt</em> (<span lang="ar" dir="rtl">طَالُوت</span>), and Muslim commentators have long identified him with the Saul of the Hebrew Bible.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-king-the-people-did-not-expect">The king the people did not expect</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-test-of-the-river">The test of the river</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-king-the-people-did-not-expect"} -->
<h2 class="wp-block-heading" id="the-king-the-people-did-not-expect">The king the people did not expect</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>After Moses, the Qur’an says, the leaders of Israel asked a prophet of theirs for a king to lead them in battle. God appointed Ṭālūt, and the people objected that he had no wealth; their prophet answered that God had chosen him and increased him in knowledge and stature.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The Hebrew Bible tells the same story of Samuel and Saul, and describes Saul as taller than any of the people by a head.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The Qur’anic name may itself echo that height, from the Arabic <em>ṭūl</em>, tallness.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-test-of-the-river"} -->
<h2 class="wp-block-heading" id="the-test-of-the-river">The test of the river</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an adds a test at a river: those who drank their fill would not be of Ṭālūt’s army, those who took only a handful from it would. Few passed, and that small band, trusting God, defeated Goliath’s army when David killed Goliath.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> The Hebrew Bible tells of a similar test of drinking water in the story of Gideon.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">فَلَمَّا فَصَلَ طَالُوتُ بِٱلْجُنُودِ قَالَ إِنَّ ٱللَّهَ مُبْتَلِيكُم بِنَهَرٍ فَمَن شَرِبَ مِنْهُ فَلَيْسَ مِنِّى وَمَن لَّمْ يَطْعَمْهُ فَإِنَّهُۥ مِنِّىٓ إِلَّا مَنِ ٱغْتَرَفَ غُرْفَةًۢ بِيَدِهِۦ ۚ فَشَرِبُوا۟ مِنْهُ إِلَّا قَلِيلًا مِّنْهُمْ ۚ فَلَمَّا جَاوَزَهُۥ هُوَ وَٱلَّذِينَ ءَامَنُوا۟ مَعَهُۥ قَالُوا۟ لَا طَاقَةَ لَنَا ٱلْيَوْمَ بِجَالُوتَ وَجُنُودِهِۦ ۚ قَالَ ٱلَّذِينَ يَظُنُّونَ أَنَّهُم مُّلَـٰقُوا۟ ٱللَّهِ كَم مِّن فِئَةٍ قَلِيلَةٍ غَلَبَتْ فِئَةً كَثِيرَةًۢ بِإِذْنِ ٱللَّهِ ۗ وَٱللَّهُ مَعَ ٱلصَّـٰبِرِينَ ٢٤٩</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And when Saul went forth with the soldiers, he said, "Indeed, Allāh will be testing you with a river. So whoever drinks from it is not of me, and whoever does not taste it is indeed of me, excepting one who takes [from it] in the hollow of his hand." But they drank from it, except a [very] few of them. Then when he had crossed it along with those who believed with him, they said, "There is no power for us today against Goliath and his soldiers." But those who were certain that they would meet Allāh said, "How many a small company has overcome a large company by permission of Allāh. And Allāh is with the patient."</p>
<!-- /wp:paragraph -->
<cite>Qur’an 2:249<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse gives the story its point. The Qur’an tells it for its lesson, a king chosen for knowledge and strength over wealth, and a small army that wins because it is patient and trusts God: ‘how many a small company has overcome a large company by permission of Allah.’ The story Muslims read is the story of David’s rise, told as a lesson in faith.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/reference/figures/#david">David</a>, <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Saul</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/2/246">Qur’an 2:246</a>-247, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">1 Samuel 8:4-22; 9:2; 10:23. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 2:249-251. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Judges 7:4-7. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 2:249, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:interfaith-marriage', 'photo' => array( 'name' => 'ai-marriage-rings', 'alt' => 'Interfaith marriage: the hands of a bride and groom wearing wedding rings' ), 'type' => 'post', 'slug' => 'interfaith-marriage', 'title' => 'Can a Muslim marry a Christian? Interfaith marriage',
			'excerpt' => 'Can a Muslim marry a Christian or a Jew? The Qur’an’s rule, the rights Islamic law gave the wife, and how Jewish and Christian law treat marriage across faiths.', 'description' => 'Interfaith marriage in Islam, Judaism and Christianity: can a Muslim marry a Christian? The rules compared. Read on.', 'categories' => array( 'religion', 'theology', 'interfaith-studies' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Interfaith marriage is treated differently by each Abrahamic tradition. Can a Muslim marry a Christian or a Jew? Each of the Abrahamic traditions has rules on marriage across religious lines, and Islam’s are the most open of the three toward the People of the Book.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-islamic-rule">The Islamic rule</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#what-islamic-law-guaranteed-the-wife">What Islamic law guaranteed the wife</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#judaism-and-christianity">Judaism and Christianity</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-islamic-rule"} -->
<h2 class="wp-block-heading" id="the-islamic-rule">The Islamic rule</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an permits a Muslim man to marry a chaste woman from among those given the scripture before, Jewish or Christian, in the same verse that makes their food lawful to Muslims.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> It forbids marriage with idolaters until they believe, and it does not permit Muslim women to marry men outside the faith.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The reason classical jurists gave is the husband’s place as head of the household: a Muslim husband is bound to honour his wife’s faith, while a non-Muslim husband is under no such obligation toward Islam.</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">ٱلْيَوْمَ أُحِلَّ لَكُمُ ٱلطَّيِّبَـٰتُ ۖ وَطَعَامُ ٱلَّذِينَ أُوتُوا۟ ٱلْكِتَـٰبَ حِلٌّ لَّكُمْ وَطَعَامُكُمْ حِلٌّ لَّهُمْ ۖ وَٱلْمُحْصَنَـٰتُ مِنَ ٱلْمُؤْمِنَـٰتِ وَٱلْمُحْصَنَـٰتُ مِنَ ٱلَّذِينَ أُوتُوا۟ ٱلْكِتَـٰبَ مِن قَبْلِكُمْ إِذَآ ءَاتَيْتُمُوهُنَّ أُجُورَهُنَّ مُحْصِنِينَ غَيْرَ مُسَـٰفِحِينَ وَلَا مُتَّخِذِىٓ أَخْدَانٍ ۗ وَمَن يَكْفُرْ بِٱلْإِيمَـٰنِ فَقَدْ حَبِطَ عَمَلُهُۥ وَهُوَ فِى ٱلْـَٔاخِرَةِ مِنَ ٱلْخَـٰسِرِينَ ٥</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">This day [all] good foods have been made lawful, and the food of those who were given the Scripture is lawful for you and your food is lawful for them. And [lawful in marriage are] chaste women from among the believers and chaste women from among those who were given the Scripture before you, when you have given them their due compensation, desiring chastity, not unlawful sexual intercourse or taking [secret] lovers. And whoever denies the faith - his work has become worthless, and he, in the Hereafter, will be among the losers.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 5:5<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"what-islamic-law-guaranteed-the-wife"} -->
<h2 class="wp-block-heading" id="what-islamic-law-guaranteed-the-wife">What Islamic law guaranteed the wife</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The protection was real. In his comparison of Jewish life under medieval Islam and Christendom, the historian Mark Cohen records that Islamic law required a Muslim husband to allow his Jewish wife to keep her religious rites, to pray in the family house, to keep the Sabbath and to observe the dietary laws.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Christian Europe, by contrast, regarded such marriages with horror.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"judaism-and-christianity"} -->
<h2 class="wp-block-heading" id="judaism-and-christianity">Judaism and Christianity</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Torah forbade Israel to intermarry with the peoples of Canaan, and Jewish law has generally prohibited marriage outside the faith.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Paul told Christians not to be ‘unequally yoked’ with unbelievers.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> In Catholic law today a marriage between a Catholic and an unbaptised person, including a Muslim or a Jew, is invalid without an express dispensation, and the Catholic must promise to raise the children in the Church.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The verse explains the Islamic position from within. It places marriage beside food in a single sentence, making the households of Jews and Christians a place where Muslims may eat and marry. Few religious laws express so much respect for another community’s faith.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/food-and-faith/">Food and faith</a>, <a href="/journal/religious-law/">Religious law in the Abrahamic traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on interfaith marriage</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/5/5">Qur’an 5:5</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur’an 2:221; 60:10. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 5:5, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Mark R. Cohen, <em>Under Crescent and Cross: The Jews in the Middle Ages</em> (Princeton: Princeton University Press, 1994; new edition 2008), as described by the publisher. Cf. Daniel Pipes, review of the same, 1995. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Deuteronomy 7:3-4. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">2 Corinthians 6:14. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7"><em>Catechism of the Catholic Church</em>, 1635. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:gog-and-magog-and-the-dajjal', 'photo' => array( 'name' => 'ai-derbent-walls', 'alt' => 'Gog and Magog: ancient stone fortress walls on a hillside' ), 'type' => 'post', 'slug' => 'gog-and-magog-and-the-dajjal', 'title' => 'Gog and Magog, the Antichrist and the Dajjal',
			'excerpt' => 'Gog and Magog in Ezekiel, Revelation and the Qur’an, and the deceiver of the last days: the Antichrist of the New Testament and the Dajjal of the hadith.', 'description' => 'Gog and Magog, the Antichrist and the Dajjal in the Bible, the Qur’an and the hadith. Read the comparison.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>All three of the large Abrahamic traditions expect a time of trial before the end. Two figures appear in all of them: the destructive nations of Gog and Magog, and a great deceiver whom Christians call the Antichrist and Muslims the Dajjal.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#gog-and-magog">Gog and Magog</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-antichrist-and-the-dajjal">The deceiver of the last days</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"gog-and-magog"} -->
<h2 class="wp-block-heading" id="gog-and-magog">Gog and Magog</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ezekiel prophesies against ‘Gog, of the land of Magog’, who will come against Israel in the last days, and the Book of Revelation speaks of Gog and Magog gathered for battle when Satan is released at the end of the thousand years.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The Qur’an tells of Dhū al-Qarnayn, a righteous ruler whom a people asked for protection from Gog and Magog, <em>Yaʾjūj wa-Maʾjūj</em> (<span lang="ar" dir="rtl">يَأْجُوج وَمَأْجُوج</span>), who were spreading corruption in the land. He built a barrier of iron and copper against them, and declared that it would stand until the promise of his Lord came, when God would level it.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">قَالَ هَـٰذَا رَحْمَةٌ مِّن رَّبِّى ۖ فَإِذَا جَآءَ وَعْدُ رَبِّى جَعَلَهُۥ دَكَّآءَ ۖ وَكَانَ وَعْدُ رَبِّى حَقًّا ٩٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">[Dhul-Qarnayn] said, "This is a mercy from my Lord; but when the promise of my Lord comes [i.e., approaches], He will make it level, and ever is the promise of my Lord true."</p>
<!-- /wp:paragraph -->
<cite>Qur’an 18:98<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"the-antichrist-and-the-dajjal"} -->
<h2 class="wp-block-heading" id="the-antichrist-and-the-dajjal">The deceiver of the last days</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The New Testament warns of the antichrist, and of a ‘man of lawlessness’ who will exalt himself and set himself in the temple of God, proclaiming himself to be God.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Prophet Muhammad warned of the same deceiver, <em>al-Dajjāl</em> (<span lang="ar" dir="rtl">ٱلدَّجَّال</span>, the deceiver), and said that no prophet was sent without warning his people against him; the Dajjal is blind in one eye, and ‘your Lord is not so.’<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Muslims believe that Jesus will return and defeat him.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The verse of Dhū al-Qarnayn gives the Islamic account its tone. The barrier stands by God’s mercy, and it falls only when His promise comes due: ‘the promise of my Lord is ever true.’ The end, in every one of these traditions, belongs to God, and the deceiver’s blindness is the sign that he is a creature and no god.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/the-messiah-in-three-traditions/">The Messiah in three traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Ezekiel 38:1-23; Revelation 20:7-8. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2"><a href="https://quran.com/18/94">Qur’an 18:94</a>-98; cf. 21:96. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 18:98, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">1 John 2:18; 2 Thessalonians 2:3-4. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Ṣaḥīḥ al-Bukhārī 7131, narrated by Anas. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:what-does-begotten-mean', 'photo' => array( 'name' => 'ai-sunrays', 'alt' => 'Begotten: rays of sunlight breaking through clouds' ), 'type' => 'post', 'slug' => 'what-does-begotten-mean', 'title' => 'What does ‘begotten’ mean? John 3:16 and the Qur’an',
			'excerpt' => 'What does ‘only begotten Son’ mean in John 3:16? The Greek word, the creed of Nicaea, and the Qur’an’s answer that God neither begets nor is born.', 'description' => 'What does ‘begotten’ mean? John 3:16, the Nicene Creed and Surah al-Ikhlas compared. Read the answer.', 'categories' => array( 'theology', 'scripture' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>‘For God so loved the world, that he gave his only begotten Son’: no verse of the New Testament is better known. What does ‘begotten’ mean, and why does the Qur’an insist that God ‘neither begets nor is born’?</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#begotten-in-the-bible">Begotten in the Bible</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#begotten-not-made">The creed of 381</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-word-in-brief">The word in brief</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#neither-begets-nor-is-born">Neither begets nor is born</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"begotten-in-the-bible"} -->
<h2 class="wp-block-heading" id="begotten-in-the-bible">Begotten in the Bible</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Greek word in John 3:16 is <em>monogenēs</em>, which the King James Version rendered ‘only begotten’. Many modern translations render it ‘only Son’.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The Hebrew Bible calls Israel God’s firstborn son and the king God’s son, ‘this day have I begotten thee’, using sonship as a picture of God’s favour.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"begotten-not-made"} -->
<h2 class="wp-block-heading" id="begotten-not-made">The creed of 381</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The creed of Nicaea, completed at Constantinople in 381, turned the word into doctrine: the Son is ‘begotten of the Father before all ages, begotten, not made, of one substance with the Father.’ Here ‘begotten’ means that the Son shares the Father’s very being. See <a href="/journal/the-council-of-nicaea/">The Council of Nicaea, 325</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-word-in-brief"} -->
<h2 class="wp-block-heading" id="the-word-in-brief">The word in brief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Greek <em>monogenēs</em> joins <em>monos</em>, only, to a root that can mean kind or birth, and scholars still debate whether John meant “only of its kind” or “only born”. The earliest Latin versions rendered it <em>unicus</em>, unique, and Jerome, revising them, chose <em>unigenitus</em>, from which the English phrase descends. The creed then took the second sense and built on it the eternal generation of the Son. Muslims read the same passage, and the Hebrew usage before it, as the language of love and election, which the Qur’an itself never uses of God, so as to close the door to any likeness between the Creator and His creatures.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"neither-begets-nor-is-born"} -->
<h2 class="wp-block-heading" id="neither-begets-nor-is-born">Neither begets nor is born</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an answers in its shortest chapter:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">قُلْ هُوَ ٱللَّهُ أَحَدٌ ١</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Say, "He is Allāh, [who is] One,</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">ٱللَّهُ ٱلصَّمَدُ ٢</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Allāh, the Eternal Refuge.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">لَمْ يَلِدْ وَلَمْ يُولَدْ ٣</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">He neither begets nor is born,</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَلَمْ يَكُن لَّهُۥ كُفُوًا أَحَدٌۢ ٤</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Nor is there to Him any equivalent."</p>
<!-- /wp:paragraph -->
<cite>Qur’an 112:1-4<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>Elsewhere it asks how God could have a son when He has no consort and created all things, and it says that it is not befitting for God to take a son: when He decrees a matter, He says only ‘Be’, and it is.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The chapter answers the creed in its own vocabulary. Where the creed says ‘begotten, not made’, the Qur’an says that God neither begets nor is begotten, and that nothing is comparable to Him; whatever comes from God is made by His command. On this view the Jewish usage of the Hebrew Bible was right all along: ‘son of God’ described a servant God loved, and nothing more.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/abrahamic-monotheism/">Monotheism in the Abrahamic religions</a>, <a href="/journal/the-council-of-nicaea/">The Council of Nicaea, 325</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">John 3:16, King James Version; cf. New Revised Standard Version, which reads ‘his only Son’. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Exodus 4:22; Psalm 2:7. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3"><a href="https://quran.com/112/1">Qur’an 112:1</a>-4, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur’an 6:101; 19:35. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:harut-and-marut', 'photo' => array( 'name' => 'ai-babylon-ruins', 'alt' => 'Harut and Marut: the ruins of ancient Babylon in Iraq' ), 'type' => 'post', 'slug' => 'harut-and-marut', 'title' => 'Harut and Marut: the two angels of Babylon',
			'excerpt' => 'Who were Hārūt and Mārūt? The Qur’an’s sober account of two angels at Babylon who warned before they taught, and the later legend that scholars rejected.', 'description' => 'Who were Harut and Marut? The two angels of Babylon in the Qur’an, and the legend scholars rejected. Read more.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Two angels are named once in the Qur’an, in a verse about magic in Babylon: Hārūt and Mārūt. Later storytellers wrapped them in a lurid legend; the Qur’an itself tells something far more sober.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#what-the-quran-says">What the Qur’an says</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-legend">The legend</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَٱتَّبَعُوا۟ مَا تَتْلُوا۟ ٱلشَّيَـٰطِينُ عَلَىٰ مُلْكِ سُلَيْمَـٰنَ ۖ وَمَا كَفَرَ سُلَيْمَـٰنُ وَلَـٰكِنَّ ٱلشَّيَـٰطِينَ كَفَرُوا۟ يُعَلِّمُونَ ٱلنَّاسَ ٱلسِّحْرَ وَمَآ أُنزِلَ عَلَى ٱلْمَلَكَيْنِ بِبَابِلَ هَـٰرُوتَ وَمَـٰرُوتَ ۚ وَمَا يُعَلِّمَانِ مِنْ أَحَدٍ حَتَّىٰ يَقُولَآ إِنَّمَا نَحْنُ فِتْنَةٌ فَلَا تَكْفُرْ ۖ فَيَتَعَلَّمُونَ مِنْهُمَا مَا يُفَرِّقُونَ بِهِۦ بَيْنَ ٱلْمَرْءِ وَزَوْجِهِۦ ۚ وَمَا هُم بِضَآرِّينَ بِهِۦ مِنْ أَحَدٍ إِلَّا بِإِذْنِ ٱللَّهِ ۚ وَيَتَعَلَّمُونَ مَا يَضُرُّهُمْ وَلَا يَنفَعُهُمْ ۚ وَلَقَدْ عَلِمُوا۟ لَمَنِ ٱشْتَرَىٰهُ مَا لَهُۥ فِى ٱلْـَٔاخِرَةِ مِنْ خَلَـٰقٍ ۚ وَلَبِئْسَ مَا شَرَوْا۟ بِهِۦٓ أَنفُسَهُمْ ۚ لَوْ كَانُوا۟ يَعْلَمُونَ ١٠٢</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And they followed [instead] what the devils had recited during the reign of Solomon. It was not Solomon who disbelieved, but the devils disbelieved, teaching people magic and that which was revealed to the two angels at Babylon, Hārūt and Mārūt.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">But they [i.e., the two angels] do not teach anyone unless they say, "We are a trial, so do not disbelieve [by practicing magic]." And [yet] they learn from them that by which they cause separation between a man and his wife. But they do not harm anyone through it except by permission of Allāh. And they [i.e., people] learn what harms them and does not benefit them. But they [i.e., the Children of Israel] certainly knew that whoever purchased it [i.e., magic] would not have in the Hereafter any share. And wretched is that for which they sold themselves, if they only knew.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 2:102<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"what-the-quran-says"} -->
<h2 class="wp-block-heading" id="what-the-quran-says">What the Qur’an says</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The verse clears Solomon of the charge of sorcery, which some in Israel laid against him, and places the blame on the devils who taught magic. The two angels at Babylon taught nothing without first warning: ‘We are a trial, so do not disbelieve.’ Their knowledge could harm no one except by God’s permission. Muslim scholarship counts them as two angels sent to test people at a time when magic was widespread, and holds that the verse tells all that needs to be known about them.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-legend"} -->
<h2 class="wp-block-heading" id="the-legend">The legend</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A later story, found in some commentaries, makes them angels who mocked human weakness, were sent to earth, fell into sin with a woman and were punished in a well in Babylon. Britannica notes that it parallels a Jewish legend of the fallen angels Shemḥazai and ʿAzaʾel, and that their names may echo two Zoroastrian archangels.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Many Muslim scholars rejected the legend because angels, in the Qur’an, do not disobey God, and because nothing in the Qur’an or the authentic Sunnah supports it.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Read beside the verse, the contrast is plain. Where the legend imagines angels who fall, the Qur’an presents angels who warn: their very words, ‘we are a trial’, protect anyone who listens. The verse uses the story of Babylon to teach that harm and benefit are in God’s hands alone.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/haman-in-the-quran/">Haman in the Qur’an</a>, <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Harut and Marut</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/2/102">Qur’an 2:102</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">“Harut and Marut,” Encyclopedia of Islamic Terms, Islamic Content (islamic-content.com). <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">“Hārūt and Mārūt,” <em>Encyclopaedia Britannica</em>. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">“Harut and Marut,” Islamic Content, op. cit. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:deuteronomy-18-18', 'photo' => array( 'name' => 'ai-wadi-mujib', 'alt' => 'Deuteronomy 18: the canyon of Wadi Mujib in Jordan, the ancient land of Moab' ), 'type' => 'post', 'slug' => 'deuteronomy-18-18', 'title' => 'Deuteronomy 18:18: the prophet like Moses',
			'excerpt' => 'Deuteronomy 18:18 promises a prophet like Moses from among Israel’s brethren. How Christians and Muslims read it, and why Muslims see in it the Prophet Muhammad.', 'description' => 'Deuteronomy 18:18 and the prophet like Moses: the Christian reading and the Muslim one. Read the comparison.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>In Deuteronomy God promises Moses a successor: ‘I will raise them up a Prophet from among their brethren, like unto thee, and will put my words in his mouth; and he shall speak unto them all that I shall command him.’<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Christians and Muslims both read the verse as a prophecy, and the comparison is instructive.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#a-prophet-like-moses">A prophet like Moses</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#from-among-their-brethren">From among their brethren</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"a-prophet-like-moses"} -->
<h2 class="wp-block-heading" id="a-prophet-like-moses">A prophet like Moses</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Peter, in Acts, applies the promise to Jesus.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Yet Deuteronomy itself closes by saying that there arose not a prophet since in Israel like unto Moses.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Moses was a prophet, a lawgiver and the leader of a nation; he married, had children, died a natural death, and brought a written law. Muslims point out that the Prophet Muhammad matches him in each of these points, while the Gospels present Jesus as unlike Moses in most of them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"from-among-their-brethren"} -->
<h2 class="wp-block-heading" id="from-among-their-brethren">From among their brethren</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The prophet is to come ‘from among their brethren’. Genesis twice uses the same language of Ishmael, who would dwell ‘in the presence of all his brethren’.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Muslims read the brethren of Israel as the children of Ishmael, from whom the Prophet descended. The Qur’an draws the parallel with Moses itself:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">إِنَّآ أَرْسَلْنَآ إِلَيْكُمْ رَسُولًا شَـٰهِدًا عَلَيْكُمْ كَمَآ أَرْسَلْنَآ إِلَىٰ فِرْعَوْنَ رَسُولًا ١٥</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Indeed, We have sent to you a Messenger as a witness upon you just as We sent to Pharaoh a messenger.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 73:15<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>It also speaks of a witness from the Children of Israel who testified to something similar and believed.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> The verse states in one sentence what Deuteronomy promised: a messenger sent to his people as Moses was sent to Pharaoh, speaking the words God put in his mouth. The Qur’an, in the Muslim reading, is those words.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/muhammad-in-the-bible/">Muhammad in the Bible</a>, <a href="/journal/ishmael/">Ishmael in the Abrahamic traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Deuteronomy 18</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Deuteronomy 18:18, King James Version; cf. 18:15. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Acts 3:22-23. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Deuteronomy 34:10. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Genesis 16:12; 25:18. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5"><a href="https://quran.com/73/15">Qur’an 73:15</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Qur’an 46:10, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:muhammad-in-the-bible', 'photo' => array( 'name' => 'ai-quran-beads', 'alt' => 'Muhammad in the Bible: an open Qur’an with prayer beads' ), 'type' => 'post', 'slug' => 'muhammad-in-the-bible', 'title' => 'Is Muhammad mentioned in the Bible?',
			'excerpt' => 'Is Muhammad mentioned in the Bible? The Qur’an’s claim, the name Ahmad, and the passages Muslims read: Deuteronomy 18, the Paraclete and Isaiah 42.', 'description' => 'Muhammad in the Bible: the Qur’an’s claim and the passages Muslims read, from Deuteronomy to the Paraclete. Read on.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Muhammad in the Bible is a question Muslims and Christians have argued for centuries. Is Muhammad mentioned in the Bible? The Qur’an says that the Jews and Christians of the Prophet’s day found him described in their scriptures, and Muslim scholars have pointed to several passages ever since.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-promise-in-the-quran">The promise in the Qur’an</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#passages-muslims-read">The passages Muslims read</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-witness-of-the-verse">The witness of the verse</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">ٱلَّذِينَ يَتَّبِعُونَ ٱلرَّسُولَ ٱلنَّبِىَّ ٱلْأُمِّىَّ ٱلَّذِى يَجِدُونَهُۥ مَكْتُوبًا عِندَهُمْ فِى ٱلتَّوْرَىٰةِ وَٱلْإِنجِيلِ يَأْمُرُهُم بِٱلْمَعْرُوفِ وَيَنْهَىٰهُمْ عَنِ ٱلْمُنكَرِ وَيُحِلُّ لَهُمُ ٱلطَّيِّبَـٰتِ وَيُحَرِّمُ عَلَيْهِمُ ٱلْخَبَـٰٓئِثَ وَيَضَعُ عَنْهُمْ إِصْرَهُمْ وَٱلْأَغْلَـٰلَ ٱلَّتِى كَانَتْ عَلَيْهِمْ ۚ فَٱلَّذِينَ ءَامَنُوا۟ بِهِۦ وَعَزَّرُوهُ وَنَصَرُوهُ وَٱتَّبَعُوا۟ ٱلنُّورَ ٱلَّذِىٓ أُنزِلَ مَعَهُۥٓ ۙ أُو۟لَـٰٓئِكَ هُمُ ٱلْمُفْلِحُونَ ١٥٧</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Those who follow the Messenger, the unlettered prophet, whom they find written [i.e., described] in what they have of the Torah and the Gospel, who enjoins upon them what is right and prohibits them from what is wrong and makes lawful for them what is good and forbids them from what is evil and relieves them of their burden and the shackles which were upon them. So they who have believed in him, honored him, supported him and followed the light which was sent down with him - it is those who will be the successful.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 7:157<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"the-promise-in-the-quran"} -->
<h2 class="wp-block-heading" id="the-promise-in-the-quran">The promise in the Qur’an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an records Jesus announcing good tidings of a messenger to come after him, whose name is Aḥmad.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Aḥmad, ‘most praised’, comes from the same root as Muḥammad, ‘praised’.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"passages-muslims-read"} -->
<h2 class="wp-block-heading" id="passages-muslims-read">The passages Muslims read</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muslim scholars have most often cited three passages. The first is the prophet like Moses promised in Deuteronomy, raised up from among Israel’s brethren; see <a href="/journal/deuteronomy-18-18/">Deuteronomy 18:18</a>. The second is the Paraclete of John’s Gospel, another ‘Comforter’ whom Jesus promised would come after him, guide his followers into all truth, and speak only what he hears.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Christians identify the Paraclete with the Holy Spirit, as John 14:26 does; Muslims observe that the figure who comes only after Jesus departs, and speaks what he hears, fits a prophet. The third is the servant of Isaiah 42, whose coming makes the villages of Kedar, Ishmael’s son, lift up their voice; see <a href="/journal/who-was-kedar/">Kedar, the Arabs and the prophets</a>.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-witness-of-the-verse"} -->
<h2 class="wp-block-heading" id="the-witness-of-the-verse">The witness of the verse</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The verse makes a claim about the Prophet’s own time: the People of the Book ‘find him written’ in the Torah and the Gospel. Its strength lies in that it was addressed to Jews and Christians who could have answered it, and some of them did believe. On the Muslim view the passages above are what remains of that description, recognised by those who knew their scriptures best when the Prophet came.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/deuteronomy-18-18/">Deuteronomy 18:18</a>, <a href="/journal/who-was-kedar/">Who was Kedar?</a>, <a href="/journal/the-islamic-dilemma/">The Islamic Dilemma answered</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Muhammad in the Bible</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/7/157">Qur’an 7:157</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur’an 61:6, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">John 14:16; 16:7-14. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Isaiah 42:1-11. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:jews-under-muslim-rule', 'photo' => array( 'name' => 'ai-synagogue', 'alt' => 'Jews under Muslim rule: the interior of a historic synagogue' ), 'type' => 'post', 'slug' => 'jews-under-muslim-rule', 'title' => 'Jews and Muslims in history: the record under Islam',
			'excerpt' => 'Do Muslims hate Jews? What the Qur’an commands, and what historians find in the record of Jewish life under Islam compared with medieval Christian Europe.', 'description' => 'Jews under Muslim rule: what the Qur’an commands and what historians find in the record. Read the history here.', 'categories' => array( 'history', 'religion', 'interfaith-studies' ), 'days_ago' => 0, 'since' => 88, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Jews under Muslim rule lived for centuries in greater security than in Christian Europe. Do Muslims hate Jews? The question is asked often, usually because of the conflicts of the last century. The longer history of Jews and Muslims tells a different story: for most of the past fourteen centuries, Jews found in the lands of Islam a security they rarely knew in Christian Europe.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#what-the-quran-commands">What the Qur’an commands</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-historical-record">The historical record</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#justice-toward-all">Justice toward all</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"what-the-quran-commands"} -->
<h2 class="wp-block-heading" id="what-the-quran-commands">What the Qur’an commands</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an promises reward to the Jews and Christians who believe in God and the Last Day and do good.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> It permits Muslims to eat the food of the People of the Book and to marry their women.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> And it commands justice and kindness toward all who do not fight Muslims because of their religion:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">لَّا يَنْهَىٰكُمُ ٱللَّهُ عَنِ ٱلَّذِينَ لَمْ يُقَـٰتِلُوكُمْ فِى ٱلدِّينِ وَلَمْ يُخْرِجُوكُم مِّن دِيَـٰرِكُمْ أَن تَبَرُّوهُمْ وَتُقْسِطُوٓا۟ إِلَيْهِمْ ۚ إِنَّ ٱللَّهَ يُحِبُّ ٱلْمُقْسِطِينَ ٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Allāh does not forbid you from those who do not fight you because of religion and do not expel you from your homes - from being righteous toward them and acting justly toward them. Indeed, Allāh loves those who act justly.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 60:8<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"the-historical-record"} -->
<h2 class="wp-block-heading" id="the-historical-record">The historical record</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The historian Mark Cohen of Princeton, in the first systematic comparison of Jewish life under medieval Islam and medieval Christendom, rejected both the myth of an interfaith utopia and the claim that Jews were persecuted under Islam as they were in Europe.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>He concluded that relations between Muslims and Jews, though not utopian, were less confrontational and violent than those between Christians and Jews in the West, and that Jews were treated oppressively in northern Europe and expelled while they fared much better in the lands of Islam.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup><sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Jews under Muslim rule had a regular legal status, took part in the mainstream of cultural life, and mixed socially with their neighbours.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> The documents of the Cairo Genizah show that world from inside; see <a href="/journal/the-cairo-genizah/">The Cairo Genizah</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"justice-toward-all"} -->
<h2 class="wp-block-heading" id="justice-toward-all">Justice toward all</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The verse explains the record. Islamic law gave Jews and Christians a protected place, with the right to keep their faith, their courts and their places of worship, because the Qur’an forbids Muslims only from those who make war on them, and commands justice toward everyone else. Hatred of Jews as Jews has no ground in the Qur’an, which elsewhere commands that hostility toward any people must never lead Muslims away from justice.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Where it appears in the modern world, it betrays Islam’s own teaching and its own history.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-cairo-genizah/">The Cairo Genizah</a>, <a href="/journal/war-and-peace/">War and peace in the Abrahamic traditions</a>, <a href="/journal/interfaith-marriage/">Interfaith marriage</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes on Jews under Muslim rule</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/2/62">Qur’an 2:62</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur’an 5:5, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 60:8, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Mark R. Cohen, <em>Under Crescent and Cross: The Jews in the Middle Ages</em> (Princeton: Princeton University Press, 1994; new edition 2008), as described by the publisher. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">“Cohen illuminates controversial relationship between Jews and Muslims,” Princeton University, 7 February 2011. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Daniel Pipes, review of Mark R. Cohen, <em>Under Crescent and Cross</em>, 1995. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Qur’an 5:8, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:galilee', 'photo' => array( 'name' => 'hs-galilee', 'alt' => 'The shore of the Sea of Galilee, where Jesus taught' ), 'type' => 'post', 'slug' => 'galilee', 'title' => 'Galilee: Capernaum, Cana, Tabgha and Mount Tabor',
			'excerpt' => 'Galilee in the Gospels and the Qur’an: Capernaum, the wedding at Cana, the feeding at Tabgha and the table from heaven, and Mount Tabor.', 'description' => 'Galilee: Capernaum, Cana, Tabgha and Mount Tabor, and the table from heaven in the Qur’an. Read the guide.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Galilee, the hill country around the lake that the Gospels call the Sea of Galilee, is where Jesus spent most of his ministry. Four places there still draw pilgrims: Capernaum, Cana, Tabgha and Mount Tabor. Each is tied to a story in the Gospels, and two of those stories have echoes in the Qur’an.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#capernaum">Capernaum, his own town</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#cana">Cana and the wedding</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#tabgha-and-the-table-from-heaven">Tabgha and the table from heaven in Galilee</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mount-tabor">Mount Tabor</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"capernaum"} -->
<h2 class="wp-block-heading" id="capernaum">Capernaum, his own town</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Matthew says that Jesus left Nazareth and settled in Capernaum, a fishing town on the north shore of the lake, and Mark places his first teaching in its synagogue.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The white limestone synagogue that visitors see today was built in the fourth or fifth century over the black basalt foundations of an older one. Nearby, a modern church stands over the remains of a house that early Christians venerated as the home of Peter.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"cana"} -->
<h2 class="wp-block-heading" id="cana">Cana and the wedding</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>At a wedding in Cana, John’s Gospel says, Jesus turned water into wine, the first of his signs.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Two villages have claimed the site; most pilgrims visit Kafr Kanna, a few kilometres north-east of Nazareth, where Catholic and Orthodox churches mark the tradition.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"tabgha-and-the-table-from-heaven"} -->
<h2 class="wp-block-heading" id="tabgha-and-the-table-from-heaven">Tabgha and the table from heaven in Galilee</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>At Tabgha, on the lakeshore between Capernaum and Magdala, a church preserves a fifth-century mosaic of a basket of loaves between two fish. It marks the feeding of the five thousand, the only miracle of Jesus told in all four Gospels.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> A smaller church beside the water recalls the risen Jesus’s breakfast with his disciples on the shore.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Qur’an tells of a meal sent from heaven at the request of Jesus’s disciples, and names a whole chapter after it, <em>al-Māʾidah</em> (<span lang="ar" dir="rtl">ٱلْمَائِدَة</span>, the table spread).<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">قَالَ عِيسَى ٱبْنُ مَرْيَمَ ٱللَّهُمَّ رَبَّنَآ أَنزِلْ عَلَيْنَا مَآئِدَةً مِّنَ ٱلسَّمَآءِ تَكُونُ لَنَا عِيدًا لِّأَوَّلِنَا وَءَاخِرِنَا وَءَايَةً مِّنكَ ۖ وَٱرْزُقْنَا وَأَنتَ خَيْرُ ٱلرَّٰزِقِينَ ١١٤</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Said Jesus, the son of Mary, "O Allāh, our Lord, send down to us a table [spread with food] from the heaven to be for us a festival for the first of us and the last of us and a sign from You. And provide for us, and You are the best of providers."</p>
<!-- /wp:paragraph -->
<cite>Qur’an 5:114<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"mount-tabor"} -->
<h2 class="wp-block-heading" id="mount-tabor">Mount Tabor</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mount Tabor rises alone from the plain of Jezreel at the south-western edge of Galilee. Christian tradition since the fourth century has placed the Transfiguration on its summit, where the Gospels say Jesus was seen in glory with Moses and Elijah.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> The Basilica of the Transfiguration on the summit was completed in 1924.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The verse sets the Galilee of the Gospels within the Qur’an’s own story of Jesus. In the Qur’an the table is a sign that Jesus asks of God, and God sends it: the miracle is God’s answer to a prophet’s prayer. Muslims who visit Tabgha can recognise there the memory of a meal that their own scripture honours, as provision from the One who is the best of providers.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/the-messiah-in-three-traditions/">The Messiah in three traditions</a>, <a href="/reference/places/">Places</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Matthew 4:13; Mark 1:21. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">John 2:1-11. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Mark 6:30-44; John 6:1-14. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4"><a href="https://quran.com/5/112">Qur’an 5:112</a>-115, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 5:114, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Mark 9:2-8. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:safed-and-tiberias', 'photo' => array( 'name' => 'hs-safed', 'alt' => 'Safed and Tiberias: the hillside city of Safed in upper Galilee' ), 'type' => 'post', 'slug' => 'safed-and-tiberias', 'title' => 'Safed and Tiberias: the holy cities of Galilee',
			'excerpt' => 'Safed and Tiberias, two of Judaism’s four holy cities: the sages, the Masoretes, the mystics of Safed and the Qur’an’s praise of the rabbis.', 'description' => 'Safed and Tiberias, holy cities of Judaism: the sages, the Masoretes and the mystics of Galilee. Read their story.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Safed and Tiberias are two of the four holy cities of Judaism, with Jerusalem and Hebron. Both lie in Galilee, and both owe their holiness to the scholars who lived and taught there: Tiberias in the centuries after the Second Temple, Safed in the sixteenth century.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#tiberias-city-of-the-sages">Tiberias, city of the sages</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#safed-and-the-sixteenth-century">Safed and Tiberias after 1492</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-rabbis-and-the-torah">The rabbis and the Torah</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"tiberias-city-of-the-sages"} -->
<h2 class="wp-block-heading" id="tiberias-city-of-the-sages">Tiberias, city of the sages</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Founded by Herod Antipas on the western shore of the Sea of Galilee around 20 CE, Tiberias became the centre of Jewish learning in the land of Israel after the wars with Rome. The Sanhedrin met there, and the scholars of its academies completed the Jerusalem Talmud around the year 400.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Later, between the eighth and tenth centuries, the scholars known as the Masoretes worked in Tiberias, under Muslim rule, fixing the vowels, accents and notes that preserve the reading of the Hebrew Bible. The Aleppo Codex, written in the tenth century and corrected by Aaron ben Asher, is the most famous product of their school. Maimonides, who died in Egypt in 1204, is buried in Tiberias.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"safed-and-the-sixteenth-century"} -->
<h2 class="wp-block-heading" id="safed-and-the-sixteenth-century">Safed and Tiberias after 1492</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Safed, high in the hills of upper Galilee, grew under the Mamluks and the Ottomans into a city of scholars. After the expulsion of the Jews from Spain in 1492, many of the exiles settled there, and in the sixteenth century Safed became the centre of Jewish mysticism. Isaac Luria taught there until his death in 1572, and Joseph Karo wrote there the code of Jewish law that is still the standard reference.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The Ottoman sultans who ruled Safed and Tiberias welcomed these refugees, and the Jewish revival of both cities took place under Muslim rule.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-rabbis-and-the-torah"} -->
<h2 class="wp-block-heading" id="the-rabbis-and-the-torah">The rabbis and the Torah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an speaks of the Torah and of the scholars who kept it:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">إِنَّآ أَنزَلْنَا ٱلتَّوْرَىٰةَ فِيهَا هُدًى وَنُورٌ ۚ يَحْكُمُ بِهَا ٱلنَّبِيُّونَ ٱلَّذِينَ أَسْلَمُوا۟ لِلَّذِينَ هَادُوا۟ وَٱلرَّبَّـٰنِيُّونَ وَٱلْأَحْبَارُ بِمَا ٱسْتُحْفِظُوا۟ مِن كِتَـٰبِ ٱللَّهِ وَكَانُوا۟ عَلَيْهِ شُهَدَآءَ ۚ فَلَا تَخْشَوُا۟ ٱلنَّاسَ وَٱخْشَوْنِ وَلَا تَشْتَرُوا۟ بِـَٔايَـٰتِى ثَمَنًا قَلِيلًا ۚ وَمَن لَّمْ يَحْكُم بِمَآ أَنزَلَ ٱللَّهُ فَأُو۟لَـٰٓئِكَ هُمُ ٱلْكَـٰفِرُونَ ٤٤</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Indeed, We sent down the Torah, in which was guidance and light. The prophets who submitted [to Allāh] judged by it for the Jews, as did the rabbis and scholars by that with which they were entrusted of the Scripture of Allāh, and they were witnesses thereto. So do not fear the people but fear Me, and do not exchange My verses for a small price [i.e., worldly gain]. And whoever does not judge by what Allāh has revealed - then it is those who are the disbelievers.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 5:44<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse honours exactly the work for which Safed and Tiberias are remembered. It names the rabbis and the scholars, <em>al-rabbāniyyūn wa-l-aḥbār</em> (<span lang="ar" dir="rtl">ٱلرَّبَّانِيُّونَ وَٱلْأَحْبَار</span>, the rabbis and the learned), who were entrusted with the scripture of God and were witnesses to it. The sages of Tiberias who fixed the text of the Hebrew Bible, and the jurists of Safed who taught its law, stand in that line, and they did their work in cities that Muslim rulers protected.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jews-under-muslim-rule/">Jews and Muslims in history</a>, <a href="/journal/the-cairo-genizah/">The Cairo Genizah</a>, <a href="/reference/sacred-texts/tanakh/">The Tanakh</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Encyclopaedia Britannica, “Tiberias”. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Joseph Karo, <em>Shulḥan ʿArukh</em> (Venice, 1565); Encyclopaedia Britannica, “Safed”. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3"><a href="https://quran.com/5/44">Qur’an 5:44</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:shiloh-and-masada', 'photo' => array( 'name' => 'hs-masada', 'alt' => 'Shiloh and Masada: the ruins of Masada above the Dead Sea' ), 'type' => 'post', 'slug' => 'shiloh-and-masada', 'title' => 'Shiloh and Masada: sanctuary and fortress',
			'excerpt' => 'Shiloh and Masada: the first sanctuary of ancient Israel, where the Ark rested, and the last fortress against Rome. With the Ark in the Qur’an.', 'description' => 'Shiloh and Masada: Israel’s first sanctuary and last fortress, and the Ark in the Qur’an. Read their story.', 'categories' => array( 'history', 'archaeology' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Shiloh and Masada mark the two ends of ancient Israel’s story in its land. Shiloh, in the hills north of Jerusalem, was its first sanctuary, where the Tabernacle and the Ark of the Covenant rested for generations. Masada, a fortress above the Dead Sea, was the last stronghold to fall to Rome after the destruction of the Second Temple.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#shiloh-and-the-ark">Shiloh and the Ark</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#masada-the-last-fortress">Masada, the last fortress</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#shiloh-and-masada-in-memory">Shiloh and Masada in memory</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"shiloh-and-the-ark"} -->
<h2 class="wp-block-heading" id="shiloh-and-the-ark">Shiloh and the Ark</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Book of Joshua says that the whole congregation of Israel assembled at Shiloh and set up the Tent of Meeting there.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The prophet Samuel grew up at Shiloh in the care of the priest Eli, and from Shiloh the Ark was carried into battle against the Philistines and captured.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Jeremiah later pointed to the ruin of Shiloh as a warning to Jerusalem.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Excavations at Khirbet Seilun have uncovered remains from the Bronze and Iron Ages and later churches built on the site.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Qur’an remembers the Ark, <em>al-tābūt</em> (<span lang="ar" dir="rtl">ٱلتَّابُوت</span>, the chest), in the story of Israel’s first king, as a sign of his authority:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَقَالَ لَهُمْ نَبِيُّهُمْ إِنَّ ءَايَةَ مُلْكِهِۦٓ أَن يَأْتِيَكُمُ ٱلتَّابُوتُ فِيهِ سَكِينَةٌ مِّن رَّبِّكُمْ وَبَقِيَّةٌ مِّمَّا تَرَكَ ءَالُ مُوسَىٰ وَءَالُ هَـٰرُونَ تَحْمِلُهُ ٱلْمَلَـٰٓئِكَةُ ۚ إِنَّ فِى ذَٰلِكَ لَـَٔايَةً لَّكُمْ إِن كُنتُم مُّؤْمِنِينَ ٢٤٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And their prophet said to them, "Indeed, a sign of his kingship is that the chest will come to you in which is assurance from your Lord and a remnant of what the family of Moses and the family of Aaron had left, carried by the angels. Indeed in that is a sign for you, if you are believers."</p>
<!-- /wp:paragraph -->
<cite>Qur’an 2:248<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"masada-the-last-fortress"} -->
<h2 class="wp-block-heading" id="masada-the-last-fortress">Masada, the last fortress</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Herod the Great built a palace-fortress on the flat summit of Masada, a rock that rises some four hundred metres above the shore of the Dead Sea. After Jerusalem fell in 70 CE, a band of Jewish rebels held out there until the Roman legion besieging them broke through in 73 or 74. The historian Josephus, the only ancient source for the siege, says that the defenders chose death over capture.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The Roman siege ramp and camps still surround the rock, and UNESCO lists Masada as a World Heritage Site.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"shiloh-and-masada-in-memory"} -->
<h2 class="wp-block-heading" id="shiloh-and-masada-in-memory">Shiloh and Masada in memory</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Shiloh speaks of the beginning of Israel’s worship in the land, Masada of the end of its independence in antiquity. Both are places of memory more than of pilgrimage. The verse gives Shiloh a place in the Qur’an’s own account: the chest that rested there carried ‘assurance from your Lord’ and the legacy of Moses and Aaron, and its return was the sign that God had chosen a king for His people. For Muslims the Ark at Shiloh is part of the history of prophecy that the Qur’an confirms.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/saul-in-the-quran/">Saul in the Qur’an</a>, <a href="/journal/the-parting-of-the-ways/">The parting of the ways</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Joshua 18:1. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">1 Samuel 1-4. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Jeremiah 7:12. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur’an 2:248, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Josephus, <em>The Jewish War</em> 7.252-406. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6"><a href="https://whc.unesco.org/en/list/1040/">Masada</a>, UNESCO World Heritage List, inscribed 2001. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:patmos-and-mount-athos', 'photo' => array( 'name' => 'hs-patmos', 'alt' => 'Patmos and Mount Athos: the town of Chora and its monastery on Patmos' ), 'type' => 'post', 'slug' => 'patmos-and-mount-athos', 'title' => 'Patmos and Mount Athos: the holy places of Orthodoxy',
			'excerpt' => 'Patmos, the island of the Book of Revelation, and Mount Athos, the monastic republic of Orthodoxy, with the Qur’an’s praise of night prayer.', 'description' => 'Patmos and Mount Athos, holy places of Orthodoxy, and the Qur’an on those who pray by night. Read the guide.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Patmos and Mount Athos are the two great holy places of the Greek Orthodox world. On Patmos, a small island in the Aegean, Christian tradition places the visions of the Book of Revelation. On Mount Athos, a mountainous peninsula in northern Greece, monks have lived in prayer for more than a thousand years.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#patmos-and-the-apocalypse">Patmos and the Apocalypse</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mount-athos">Mount Athos</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#patmos-and-mount-athos-in-the-light-of-the-quran">Patmos and Mount Athos in the light of the Qur’an</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"patmos-and-the-apocalypse"} -->
<h2 class="wp-block-heading" id="patmos-and-the-apocalypse">Patmos and the Apocalypse</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The author of Revelation says he was on the island called Patmos ‘for the word of God’ when he received his visions.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Tradition identifies him with John the apostle and shows pilgrims the cave where he is said to have seen them. In 1088 the monk Christodoulos founded the fortified Monastery of St John the Theologian above it, and the town of Chora grew around the monastery. UNESCO lists the monastery, the cave and the old town together.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mount-athos"} -->
<h2 class="wp-block-heading" id="mount-athos">Mount Athos</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mount Athos has been an Orthodox spiritual centre since the tenth century and has governed itself since Byzantine times. Twenty monasteries divide the peninsula among them, seventeen Greek and one each Russian, Serbian and Bulgarian, with smaller sketes and hermitages. By ancient rule, women may not enter. UNESCO calls the monasteries a conservatory of masterpieces, from wall paintings to manuscripts.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup><sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"patmos-and-mount-athos-in-the-light-of-the-quran"} -->
<h2 class="wp-block-heading" id="patmos-and-mount-athos-in-the-light-of-the-quran">Patmos and Mount Athos in the light of the Qur’an</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an speaks with respect of the devout among the People of the Book who stand in prayer by night:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">۞ لَيْسُوا۟ سَوَآءً ۗ مِّنْ أَهْلِ ٱلْكِتَـٰبِ أُمَّةٌ قَآئِمَةٌ يَتْلُونَ ءَايَـٰتِ ٱللَّهِ ءَانَآءَ ٱلَّيْلِ وَهُمْ يَسْجُدُونَ ١١٣</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">They are not [all] the same; among the People of the Scripture is a community standing [in obedience], reciting the verses of Allāh during periods of the night and prostrating [in prayer].</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">يُؤْمِنُونَ بِٱللَّهِ وَٱلْيَوْمِ ٱلْـَٔاخِرِ وَيَأْمُرُونَ بِٱلْمَعْرُوفِ وَيَنْهَوْنَ عَنِ ٱلْمُنكَرِ وَيُسَـٰرِعُونَ فِى ٱلْخَيْرَٰتِ وَأُو۟لَـٰٓئِكَ مِنَ ٱلصَّـٰلِحِينَ ١١٤</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">They believe in Allāh and the Last Day, and they enjoin what is right and forbid what is wrong and hasten to good deeds. And those are among the righteous.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 3:113-114<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verses describe what Athos and Patmos were built for: a community standing in prayer through the night, reciting and prostrating. The Qur’an does not call all the People of the Book alike, and it counts among the righteous those of them who believe in God and the Last Day and hasten to good deeds. Muslims who learn of the night offices of Athos can recognise in them the devotion the Qur’an praises.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-five-great-sees/">The five great sees of the church</a>, <a href="/journal/hagia-sophia/">Hagia Sophia</a>, <a href="/religions/christianity/">Christianity</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Revelation 1:9. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2"><a href="https://whc.unesco.org/en/list/942/">The Historic Centre (Chorá) with the Monastery of Saint-John the Theologian and the Cave of the Apocalypse on the Island of Pátmos</a>, UNESCO World Heritage List, inscribed 1999. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3"><a href="https://whc.unesco.org/en/list/454/">Mount Athos</a>, UNESCO World Heritage List, inscribed 1988. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Giulia Kakavas, “The Avaton Debate: Human Rights and the Monastic Community of Mount Athos,” University of Modena and Reggio Emilia. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Qur’an 3:113-114, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:christian-pilgrimage', 'photo' => array( 'name' => 'hs-santiago', 'alt' => 'Christian pilgrimage: the bell towers of the cathedral of Santiago de Compostela' ), 'type' => 'post', 'slug' => 'christian-pilgrimage', 'title' => 'Christian pilgrimage: Santiago, Lourdes and Fátima',
			'excerpt' => 'Christian pilgrimage to Santiago de Compostela, Lourdes and Fátima: the apostle James, the Marian shrines, and Mary’s rank in the Qur’an.', 'description' => 'Christian pilgrimage to Santiago, Lourdes and Fátima, and Mary’s rank in the Qur’an. Read the guide here.', 'categories' => array( 'religion', 'culture' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Christian pilgrimage in western Europe gathers round three great shrines: Santiago de Compostela in Spain, Lourdes in France and Fátima in Portugal. The first honours an apostle; the other two honour Mary, whom Christians and Muslims alike revere.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#santiago-de-compostela">Santiago de Compostela</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#lourdes-and-fatima">Lourdes and Fátima</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#mary-and-christian-pilgrimage">Mary and Christian pilgrimage</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"santiago-de-compostela"} -->
<h2 class="wp-block-heading" id="santiago-de-compostela">Santiago de Compostela</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Tradition holds that the apostle James preached in Spain and that his body was brought to Galicia after his martyrdom in Jerusalem.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> A tomb believed to be his was discovered in the ninth century, and a church, later the cathedral, rose over it. The routes that lead there, the Camino de Santiago, became one of the great pilgrim roads of medieval Christendom and are walked by hundreds of thousands each year.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"lourdes-and-fatima"} -->
<h2 class="wp-block-heading" id="lourdes-and-fatima">Lourdes and Fátima</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In 1858 Bernadette Soubirous, a fourteen-year-old girl of Lourdes in the Pyrenees, reported eighteen appearances of a lady in a grotto by the river, who called herself the Immaculate Conception. The spring there has drawn the sick ever since. In 1917 three shepherd children of Fátima reported appearances of Mary on the thirteenth of each month from May to October. Both shrines are now among the largest places of Christian pilgrimage in the world.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The name Fátima is Arabic: it recalls Fāṭimah, daughter of the Prophet Muhammad. Local legend traces it to a Moorish princess of that name who married a Christian knight after the Reconquista.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mary-and-christian-pilgrimage"} -->
<h2 class="wp-block-heading" id="mary-and-christian-pilgrimage">Mary and Christian pilgrimage</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an gives Mary a rank above all women:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَإِذْ قَالَتِ ٱلْمَلَـٰٓئِكَةُ يَـٰمَرْيَمُ إِنَّ ٱللَّهَ ٱصْطَفَىٰكِ وَطَهَّرَكِ وَٱصْطَفَىٰكِ عَلَىٰ نِسَآءِ ٱلْعَـٰلَمِينَ ٤٢</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And [mention] when the angels said, "O Mary, indeed Allāh has chosen you and purified you and chosen you above the women of the worlds.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 3:42<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse explains why Muslims can visit Lourdes and Fátima with understanding. Mary, <em>Maryam</em> (<span lang="ar" dir="rtl">مَرْيَم</span>), is the only woman named in the Qur’an, and a chapter bears her name. Muslims honour her as chosen and purified by God, without the doctrines Christians have built around her, and a shrine in a town named for the Prophet’s daughter is a reminder of how much the two faiths share in their love for her.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/mary-across-the-traditions/">Mary in the Bible and the Qur’an</a>, <a href="/journal/the-stations-of-the-hajj/">The stations of the Hajj</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Acts 12:2. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2"><a href="https://whc.unesco.org/en/list/347/">Santiago de Compostela (Old Town)</a>, UNESCO World Heritage List, inscribed 1985. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">“Why Fátima is called Fátima,” The Sounds of Portuguese. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur’an 3:42, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:masjid-al-aqsa', 'photo' => array( 'name' => 'hs-aqsa', 'alt' => 'The Qibli Mosque of Masjid al-Aqsa in Jerusalem' ), 'type' => 'post', 'slug' => 'masjid-al-aqsa', 'title' => 'Masjid al-Aqsa: the Farthest Mosque',
			'excerpt' => 'Masjid al-Aqsa, the third holiest site in Islam: the Night Journey, the first qibla, the three mosques, and the history of the sanctuary.', 'description' => 'Masjid al-Aqsa: the Night Journey, the first qibla and the history of the sanctuary. Read the full guide.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Masjid al-Aqsa, the Farthest Mosque, is the third holiest site in Islam, after the Sacred Mosque in Makkah and the Prophet’s Mosque in Madinah. The name covers the whole walled sanctuary on the hill that Jews call the Temple Mount, with the Dome of the Rock and the congregational mosque at its southern end, the Qibli Mosque.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-night-journey">The Night Journey</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#masjid-al-aqsa-the-first-qibla">Masjid al-Aqsa, the first qibla</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-history-of-the-sanctuary">A history of the sanctuary</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-night-journey"} -->
<h2 class="wp-block-heading" id="the-night-journey">The Night Journey</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Qur’an names the mosque in the first verse of the chapter of the Night Journey:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">سُبْحَـٰنَ ٱلَّذِىٓ أَسْرَىٰ بِعَبْدِهِۦ لَيْلًا مِّنَ ٱلْمَسْجِدِ ٱلْحَرَامِ إِلَى ٱلْمَسْجِدِ ٱلْأَقْصَا ٱلَّذِى بَـٰرَكْنَا حَوْلَهُۥ لِنُرِيَهُۥ مِنْ ءَايَـٰتِنَآ ۚ إِنَّهُۥ هُوَ ٱلسَّمِيعُ ٱلْبَصِيرُ ١</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">Exalted is He who took His Servant [i.e., Prophet Muḥammad (ﷺ)] by night from al-Masjid al-Ḥarām to al-Masjid al-Aqṣā, whose surroundings We have blessed, to show him of Our signs. Indeed, He is the Hearing, the Seeing.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 17:1<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>Muslims hold that the Prophet was carried by night from Makkah to Jerusalem, led the earlier prophets in prayer there, and ascended through the heavens, the <em>Miʿrāj</em> (<span lang="ar" dir="rtl">ٱلْمِعْرَاج</span>, the ascension), where the five daily prayers were prescribed.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"masjid-al-aqsa-the-first-qibla"} -->
<h2 class="wp-block-heading" id="masjid-al-aqsa-the-first-qibla">Masjid al-Aqsa, the first qibla</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>For sixteen or seventeen months after the emigration to Madinah, the Muslims prayed facing Jerusalem, before the Qur’an turned them toward the Kaaba.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The Prophet named it among the three mosques to which a journey may be made for the sake of prayer: the Sacred Mosque, his own mosque and al-Aqsa.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-history-of-the-sanctuary"} -->
<h2 class="wp-block-heading" id="a-history-of-the-sanctuary">A history of the sanctuary</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The caliph ʿUmar received the surrender of Jerusalem in 637 or 638 and had the site, then a ruin, cleared for prayer. The caliph ʿAbd al-Malik completed the Dome of the Rock in 691 or 692, and his son al-Walid built the first great congregational mosque on the southern side early in the eighth century.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Crusaders who took Jerusalem in 1099 turned the mosque into a palace and the headquarters of the Templars; Saladin restored it to Muslim worship in 1187.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The verse explains the place of Masjid al-Aqsa in Muslim hearts. God Himself named it, called its surroundings blessed, and made it the stage of the Prophet’s journey, so that the house of prayer of the earlier prophets is joined to the House that Abraham built in Makkah. Muslims who pray there pray where, on their belief, all the prophets once prayed together behind Muhammad.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jerusalem-in-three-traditions/">Jerusalem in three traditions</a>, <a href="/journal/the-kaaba/">The Kaaba</a>, <a href="/reference/places/#jerusalem">Jerusalem</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/17/1">Qur’an 17:1</a>, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Ṣaḥīḥ al-Bukhārī 399; Qur’an 2:144. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ṣaḥīḥ al-Bukhārī 1189. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Oleg Grabar, <em>The Shape of the Holy: Early Islamic Jerusalem</em> (Princeton: Princeton University Press, 1996). <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:badr-and-uhud', 'photo' => array( 'name' => 'hs-uhud', 'alt' => 'Badr and Uhud: Mount Uhud near Madinah at night' ), 'type' => 'post', 'slug' => 'badr-and-uhud', 'title' => 'Badr and Uhud: two battles in the Qur’an',
			'excerpt' => 'Badr and Uhud, the two battles the Qur’an discusses most fully: a victory of the few in 624 and a reverse in 625, and their lessons.', 'description' => 'Badr and Uhud: the victory of the few and the lesson of Uhud, as the Qur’an tells them. Read the history.', 'categories' => array( 'history', 'scripture' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Badr and Uhud are the two battles of the Prophet’s lifetime that the Qur’an discusses most fully. At Badr in 624 a small Muslim force defeated a far larger army from Makkah; at Uhud a year later the Muslims suffered a painful reverse. The Qur’an draws lessons from both.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-battle-of-badr">The battle of Badr</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-battle-of-uhud">The battle of Uhud</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#badr-and-uhud-the-lessons">Badr and Uhud: the lessons</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-battle-of-badr"} -->
<h2 class="wp-block-heading" id="the-battle-of-badr">The battle of Badr</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In Ramadan of the second year after the emigration, March 624, some three hundred Muslims met about a thousand men of Quraysh at the wells of Badr, south-west of Madinah. The Muslims won, and the leaders of Makkah’s opposition, Abu Jahl among them, were killed. The Qur’an calls the day of Badr the Day of Criterion, when the two armies met.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">وَلَقَدْ نَصَرَكُمُ ٱللَّهُ بِبَدْرٍ وَأَنتُمْ أَذِلَّةٌ ۖ فَٱتَّقُوا۟ ٱللَّهَ لَعَلَّكُمْ تَشْكُرُونَ ١٢٣</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">And already had Allāh given you victory at [the battle of] Badr while you were weak [i.e., few in number]. Then fear Allāh; perhaps you will be grateful.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 3:123<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"anchor":"the-battle-of-uhud"} -->
<h2 class="wp-block-heading" id="the-battle-of-uhud">The battle of Uhud</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A year later, in March 625, Quraysh returned with three thousand men and met the Muslims at the foot of Mount Uhud, just north of Madinah. The Prophet posted archers on a hill with orders not to leave it. When the Muslims gained the upper hand, most of the archers left their post to take the spoils, and the Makkan cavalry turned the flank. Some seventy Muslims were killed, among them the Prophet’s uncle Ḥamzah, and the Prophet himself was wounded.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Qur’an speaks plainly of what happened: God fulfilled His promise until the Muslims lost heart, disputed and disobeyed, some desiring this world.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> The martyrs of Uhud are buried at the foot of the mountain, and pilgrims to Madinah visit them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"badr-and-uhud-the-lessons"} -->
<h2 class="wp-block-heading" id="badr-and-uhud-the-lessons">Badr and Uhud: the lessons</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The verse frames both battles. Victory at Badr came to Muslims who were few and weak, by God’s help, and the Qur’an answers it with a call to fear God and be grateful. Defeat at Uhud came when obedience failed. Together Badr and Uhud teach that success depends on faith and discipline, and that neither numbers nor a single victory guarantees it.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/war-and-peace/">War and peace in the Abrahamic traditions</a>, <a href="/journal/hira-and-quba/">Hira and Quba</a>, <a href="/reference/places/#madinah">Madinah</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://quran.com/8/41">Qur’an 8:41</a>. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur’an 3:123, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 3:152. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:kairouan', 'photo' => array( 'name' => 'hs-kairouan', 'alt' => 'The courtyard and minaret of the Great Mosque of Kairouan' ), 'type' => 'post', 'slug' => 'kairouan', 'title' => 'Kairouan: the holy city of the Maghreb',
			'excerpt' => 'Kairouan, the oldest Muslim city of the Maghreb: its founding in 670, the Great Mosque of ʿUqbah, and its scholars.', 'description' => 'Kairouan, holy city of the Maghreb: its founding, the Great Mosque and its scholars. Read the history here.', 'categories' => array( 'history', 'culture' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Kairouan, in central Tunisia, is the oldest Muslim city of the Maghreb and was for centuries its principal holy city. Its Great Mosque, founded with the city in 670, became the model for the mosques of North Africa.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#the-founding-of-kairouan">The founding of the city</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-great-mosque-of-kairouan">The Great Mosque of Kairouan</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#a-city-of-scholars">A city of scholars</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"the-founding-of-kairouan"} -->
<h2 class="wp-block-heading" id="the-founding-of-kairouan">The founding of the city</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Arab commander ʿUqbah ibn Nāfiʿ founded Kairouan in 670 as a base for the Muslim advance into North Africa, choosing a site far enough inland to be safe from attack by sea. Under the Aghlabid dynasty in the ninth century the city flourished, and even after the political capital moved to Tunis in the twelfth century, Kairouan remained the Maghreb’s principal holy city.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-great-mosque-of-kairouan"} -->
<h2 class="wp-block-heading" id="the-great-mosque-of-kairouan">The Great Mosque of Kairouan</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Great Mosque of Kairouan, also called the Mosque of ʿUqbah, was rebuilt by the Aghlabid emir Ziyadat Allah I in 836 and enlarged in the 860s.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Its prayer hall rests on columns of marble and porphyry taken from Roman and Byzantine buildings, and its massive square minaret, among the oldest standing in the Islamic world, set the pattern for the minarets of the Maghreb. Nearby stands the ninth-century Mosque of the Three Gates.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-city-of-scholars"} -->
<h2 class="wp-block-heading" id="a-city-of-scholars">A city of scholars</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The city was also a centre of learning. The jurist Saḥnūn, who died in 854, taught there and compiled the work that made the Mālikī school the law of North Africa and al-Andalus. Physicians, grammarians and Jewish scholars worked in the city too, in the age when Jews corresponded from Kairouan with the academies of Baghdad.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The Qur’an describes those who build and keep God’s mosques:</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"abr-verse"} -->
<blockquote class="wp-block-quote abr-verse"><!-- wp:paragraph -->
<p class="abr-verse__ar" lang="ar" dir="rtl">إِنَّمَا يَعْمُرُ مَسَـٰجِدَ ٱللَّهِ مَنْ ءَامَنَ بِٱللَّهِ وَٱلْيَوْمِ ٱلْـَٔاخِرِ وَأَقَامَ ٱلصَّلَوٰةَ وَءَاتَى ٱلزَّكَوٰةَ وَلَمْ يَخْشَ إِلَّا ٱللَّهَ ۖ فَعَسَىٰٓ أُو۟لَـٰٓئِكَ أَن يَكُونُوا۟ مِنَ ٱلْمُهْتَدِينَ ١٨</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p class="abr-verse__en">The mosques of Allāh are only to be maintained by those who believe in Allāh and the Last Day and establish prayer and give zakāh and do not fear except Allāh, for it is expected that those will be of the [rightly] guided.</p>
<!-- /wp:paragraph -->
<cite>Qur’an 9:18<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>The verse is a fitting description of the city. Its founders and their successors maintained its mosques for more than thirteen centuries, establishing prayer and teaching the law, and the city earned its name as the holy city of the Maghreb through that faithfulness.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-kaaba/">The Kaaba</a>, <a href="/journal/masjid-al-aqsa/">Masjid al-Aqsa</a>, <a href="/journal/religious-law/">Religious law in the Abrahamic traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://whc.unesco.org/en/list/499/">Kairouan</a>, UNESCO World Heritage List, inscribed 1988. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">“Kairouan,” New World Encyclopedia. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Qur’an 9:18, trans. Saheeh International; Arabic text from Quran.com. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:tigris-and-euphrates', 'photo' => array( 'name' => 'hs-tigris', 'alt' => 'The Tigris and Euphrates: the Tigris river at Baghdad' ), 'type' => 'post', 'slug' => 'tigris-and-euphrates', 'title' => 'The Tigris and Euphrates: rivers of the Mandaeans',
			'excerpt' => 'The Tigris and Euphrates in Genesis and in Mandaean belief: living water, baptism in the river, and the Mandaeans of Iraq today.', 'description' => 'The Tigris and Euphrates: rivers of Eden and of Mandaean baptism. Read about their sacred waters here.', 'categories' => array( 'religion', 'history' ), 'days_ago' => 0, 'since' => 97, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Tigris and Euphrates are the rivers of ancient Mesopotamia and of Eden in Genesis. For the Mandaeans of southern Iraq and south-western Iran they are something more: living water, the channel through which the light of the world above reaches this one, and the place of every Mandaean baptism.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"abr-toc wp-block-rank-math-toc-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group abr-toc wp-block-rank-math-toc-block"><!-- wp:paragraph {"className":"abr-toc__title"} -->
<p class="abr-toc__title">In this article</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"abr-toc__list"} -->
<ul class="wp-block-list abr-toc__list"><!-- wp:list-item -->
<li><a href="#rivers-of-eden">Rivers of Eden</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#tigris-and-euphrates-in-mandaean-belief">Tigris and Euphrates in Mandaean belief</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><a href="#the-mandaeans-today">The Mandaeans today</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"rivers-of-eden"} -->
<h2 class="wp-block-heading" id="rivers-of-eden">Rivers of Eden</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Genesis names four rivers flowing out of Eden, two of them the Tigris and the Euphrates.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Abraham’s family came from Ur, near the lower Euphrates, and the great cities of Mesopotamia, from Babylon to Nineveh, stood on their banks. See <a href="/journal/where-was-abraham-from/">Where was Abraham from?</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"tigris-and-euphrates-in-mandaean-belief"} -->
<h2 class="wp-block-heading" id="tigris-and-euphrates-in-mandaean-belief">Tigris and Euphrates in Mandaean belief</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeans call any running water <em>yardna</em>, a Jordan, and hold that a part of all running water is the water of life that flows down from the heavenly Euphrates of light. To a Mandaean, E. S. Drower recorded, the waters of the Karun, Tigris, Euphrates or Zab are of equal sanctity, because all contain this living water.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> For that reason baptism must be performed in a river, never in still water.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Drower also noted that the rivers were sacred long before the Mandaeans: Babylonian texts speak of the Tigris and Euphrates as holy streams, and of purification with water from the mouth of the two rivers. She concluded that the Mandaean water cult, carried on at the very sites of the oldest water cults, preserves a ritual tradition of great antiquity.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-mandaeans-today"} -->
<h2 class="wp-block-heading" id="the-mandaeans-today">The Mandaeans today</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>For centuries the Mandaeans lived along the lower Tigris and Euphrates and the Karun, as goldsmiths, silversmiths and boat-builders, and the mandi, a reed hut with a pool fed from the river, stood at the water’s edge in their villages. The wars and upheavals of recent decades have driven most of them from Iraq to Europe, North America and Australia, where they seek out rivers for their baptisms. See <a href="/journal/masbuta-baptism-in-running-water/">Maṣbūtā: baptism in running water</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/religions/mandaeism/">Mandaeism</a>, <a href="/journal/john-the-baptist/">John the Baptist in four traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1"><a href="https://www.biblegateway.com/passage/?search=Genesis+2:10&amp;version=NRSVUE">Genesis 2:10</a>-14. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">E. S. Drower, <em>The Mandaeans of Iraq and Iran</em> (Oxford: Clarendon Press, 1937), p. 101. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Drower, op. cit., pp. 118-119. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
	),
);
