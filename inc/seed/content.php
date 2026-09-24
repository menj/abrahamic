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
			'key' => 'page:home', 'type' => 'page', 'slug' => 'home', 'title' => 'Home', 'parent' => '',
			'excerpt' => 'An independent educational resource on Judaism, Mandaeism, Christianity and Islam.', 'description' => 'Explore Judaism, Mandaeism, Christianity and Islam: history, scriptures, figures and places. Start here.', 'menu_order' => 0, 'special' => 'front', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Abrahamic Religions is an independent educational resource on the histories, scriptures, beliefs and practices of Judaism, Mandaeism, Christianity and Islam, and on the heritage these traditions share.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:articles', 'type' => 'page', 'slug' => 'journal', 'title' => 'Journal', 'parent' => '',
			'excerpt' => 'Explainers and essays on the history, scripture and thought of the Abrahamic traditions.', 'description' => 'Explainers on the history, scripture and thought of Judaism, Christianity and Islam. Browse the latest entries.', 'menu_order' => 1, 'special' => 'posts', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Explainers and essays on the history, scripture and thought of the Abrahamic traditions.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:judaism', 'type' => 'page', 'slug' => 'judaism', 'title' => 'Judaism', 'parent' => 'page:guides',
			'excerpt' => 'An introduction to Jewish history, scripture, practice and the movements of Jewish life today.', 'description' => 'Jewish history, scripture, practice and movements today, explained for new readers. Read our introduction to Judaism.', 'menu_order' => 2, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Judaism is the religion of the Jewish people, rooted in the covenant that the Hebrew Bible describes between God and the descendants of Abraham, Isaac and Jacob. It is the oldest of the three great monotheistic traditions of the Near East, and the ground from which Christianity and Islam later grew. Close to sixteen million Jews live worldwide, most of them in Israel and the United States.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"origins-and-covenant"} -->
<h2 class="wp-block-heading" id="origins-and-covenant">Origins and covenant</h2>
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
<p>Judaism has no binding creed. Conduct carries the weight that doctrine carries elsewhere, and considerable latitude remains in matters of belief, including the messianic future and life after death. <a href="/journal/faith-and-reason-in-medieval-thought/">Maimonides</a> set out thirteen principles in the twelfth century, and they are widely honoured without functioning as a test of membership.</p>
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
<li id="note-1">Deuteronomy 6:4. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Jacob Agus, on Judaism, in Ismaʿil Raji al Faruqi, ed., and David E. Sopher, map ed., Historical Atlas of the Religions of the World (New York: Macmillan, 1974), p. 140. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:christianity', 'type' => 'page', 'slug' => 'christianity', 'title' => 'Christianity', 'parent' => 'page:guides',
			'excerpt' => 'An introduction to Christian origins, scripture, belief and the churches of the world today.', 'description' => 'Christian origins, belief, worship and the churches of the world, explained clearly. Read our introduction to Christianity.', 'menu_order' => 3, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Christianity is the religion centred on the life, teaching, death and resurrection of Jesus of Nazareth, whom Christians confess as the Messiah and the Son of God. With about 2.4 billion adherents, it is the largest religious tradition in the world, and its divisions into Catholic, Orthodox and Protestant churches have shaped much of its history.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"origins"} -->
<h2 class="wp-block-heading" id="origins">Origins</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christianity began in the first century CE among Jewish followers of Jesus in Judea and Galilee. The Gospel of Matthew carries two traditions about how far the message was to travel: one confines the twelve to Jewish territory, while the other sends them, after the resurrection, to the ends of the earth.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The account in Acts follows the second, beginning in <a href="/journal/jerusalem-in-three-traditions/">Jerusalem</a> and moving outwards through Samaria. After his crucifixion under the Roman governor Pontius Pilate, his followers proclaimed that God had raised him from the dead. Missionaries, among them the apostle Paul, carried the message across the eastern Mediterranean, and communities of non-Jewish believers soon outnumbered the Jewish ones. The Christian Bible joins the Hebrew scriptures, called the Old Testament, with the <a href="/reference/sacred-texts/bible/">New Testament</a>.</p>
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
<li id="note-1">Gerard Sloyan, on Christianity, in Ismaʿil Raji al Faruqi, ed., and David E. Sopher, map ed., Historical Atlas of the Religions of the World (New York: Macmillan, 1974), p. 201; Matthew 10:5-6; 28:19. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Matthew 6:9-13; Luke 11:2-4. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:islam', 'type' => 'page', 'slug' => 'islam', 'title' => 'Islam', 'parent' => 'page:guides',
			'excerpt' => 'An introduction to Islamic history, the Qur’an, the Five Pillars and Muslim communities today.', 'description' => 'The Prophet, the Qur’an, the Five Pillars and Muslim communities today. Read our introduction to Islam.', 'menu_order' => 4, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Islam, (<span lang="ar" dir="rtl">إسلام</span>, "submission" to God), is the religion of Muslims, who hold that God revealed the Qur'an to the Prophet Muhammad in the seventh century CE as the final message in a line of prophets that includes Abraham, Moses and Jesus. Close to two billion people profess it, which makes it the second-largest religion in the world and the fastest-growing.</p>
<!-- /wp:paragraph -->

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
<p>Muhammad was born in <a href="/reference/places/#makkah">Makkah</a> (Mecca) around 570 CE. Muslims hold that revelation began around 610, when he was about forty, and continued for some twenty-three years. Makkah at that time was governed by a balance between clans, with four months of each year set aside in which no hostility was tolerated and the caravan routes were safe. At the centre of the city stood the sanctuary, holding the Kaaba, which Muslim tradition holds Abraham and <a href="/reference/figures/#ishmael">Ishmael</a> built for the worship of the one God, and which by then housed some three hundred idols.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> His preaching of one God met resistance in that city, and in 622 he and his followers migrated to Madinah (Medina), an event called the <em>hijrah</em> (<span lang="ar" dir="rtl">هجرة</span>, migration), which begins the Islamic calendar. By his death in 632, most of the tribes of Arabia had accepted Islam.</p>
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
<p>Muslim thought has a settled account of where the other religions stand. True religion, on this reading, is what acknowledges God as Lord and Creator and directs a person to a life of moral worth; it is natural to human beings, freely held, and no burden to carry.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Qur'an describes it as the pattern on which God made humankind, and calls the one who turns to it <em>ḥanīf</em> (<span lang="ar" dir="rtl">حنيف</span>, pure monotheist).<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Reason alone can reach that religion, and God has nevertheless sent prophets to every people, because people forget and fall away, which makes the message necessary again and again. The core of each revelation was one and the same, while the law attached to it developed with the times. On this account <a href="/religions/judaism/">Judaism</a> and <a href="/religions/christianity/">Christianity</a> began as divine religions and later departed from what had been given them, which is why the message required restating.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
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
<li id="note-5">Qur'an 30:30; 4:125. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'page:sacred-texts', 'type' => 'page', 'slug' => 'sacred-texts', 'title' => 'Sacred texts', 'parent' => 'page:knowledge-base',
			'excerpt' => 'The scriptures of Judaism, Mandaeism, Christianity and Islam, how they were compiled, and how each tradition reads them.', 'description' => 'The Hebrew Bible, the Christian Bible and the Qur’an: how each was compiled and read. Explore the sacred texts.', 'menu_order' => 5, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Each Abrahamic tradition is anchored in scripture, and each surrounds its scripture with a tradition of interpretation. What follows are the principal texts of each, and how they took shape.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="isaiah-scroll" alt="Hebrew columns of the Great Isaiah Scroll from Qumran, copied in the second century BCE" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-hebrew-bible"} -->
<h2 class="wp-block-heading" id="the-hebrew-bible">The Hebrew Bible</h2>
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
<p>The Mandaeans keep their scriptures in Mandaic, an eastern dialect of Aramaic with its own script. The largest is the <em>Ginza Rabba</em> (the Great Treasure), bound in two halves: the Right Ginza on theology, creation and history, and the Left Ginza on the ascent of the soul after death. Beside it stand the <em>Qolasta</em> (the Collection), the prayer book used in baptism and the rites for the dead, and the <em>Drasha d-Yahya</em> (the Book of John), which gathers the teachings of <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist</a>. The community keeps its own history in a scroll, the <em>Haran Gawaita</em>.</p>
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
<p>The Qur'an has 114 <em>sūrahs</em> (<span lang="ar" dir="rtl">سورة</span>, chapters), arranged broadly from longest to shortest. Muslim tradition holds that it was revealed over some twenty-three years, memorised and written down in the Prophet's lifetime, and gathered into a standard written text under the third caliph, ʿUthmān, around 650 CE. Muslim theology locates the miracle of the revelation in what was said and not in any power granted to the man who received it, a point that shapes both how the text is read and the weight given to its wording.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Alongside the written text, the Qur'an has been carried by memory: a Muslim who has memorised all of it is called a <em>ḥāfiẓ</em> (<span lang="ar" dir="rtl">حافظ</span>, "one who preserves"), and such reciters are found in Muslim communities worldwide. The ḥadīth literature records the words and deeds of the Prophet; Sunni Muslims give special weight to the collections compiled by al-Bukhārī and Muslim ibn al-Ḥajjāj.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"reading-scripture"} -->
<h2 class="wp-block-heading" id="reading-scripture">Reading scripture</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All four traditions read scripture through commentary. Jewish readers turn to the Talmud and the medieval commentators; Christian readers to the church fathers and later theologians; Muslim readers to <em>tafsīr</em> (<span lang="ar" dir="rtl">تفسير</span>, exegesis); Mandaean priests to the ritual commentaries their order transmits. Modern historical scholarship adds its own questions about authorship, dating and context. See the article <a href="/journal/understanding-the-bible-and-the-quran-in-historical-context/">Understanding the Bible and the Qur'an in Historical Context</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Ismaʿil Raji al Faruqi, in Wing-tsit Chan, Ismaʿil Raji al Faruqi, Joseph M. Kitagawa and P. T. Raju, comps., The Great Asian Religions: An Anthology (New York: Macmillan, 1969), p. 332. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:figures', 'type' => 'page', 'slug' => 'figures', 'title' => 'Figures', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Biographical and theological overviews of the people who shaped the Abrahamic traditions.', 'description' => 'Abraham, Moses, Mary, Jesus, Muhammad and others as each tradition remembers them. Meet the key figures.', 'menu_order' => 6, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Many figures appear in more than one Abrahamic scripture, often with different emphases. The overviews below note how each tradition remembers them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"adam"} -->
<h2 class="wp-block-heading" id="adam">Adam</h2>
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
<li id="note-3">Qur'an 16:123. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur'an 12:43, 12:50, 12:54, 12:72, 12:76; 7:104; 10:75. On the Egyptian usage, I. Shaw and P. Nicholson, British Museum Dictionary of Ancient Egypt (London: British Museum Press, 1995), p. 222. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:places', 'type' => 'page', 'slug' => 'places', 'title' => 'Places', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Sacred sites and historical landscapes of the Abrahamic traditions.', 'description' => 'Jerusalem, Hebron, Sinai, the Jordan, Makkah and more across four traditions. Discover the sacred places.', 'menu_order' => 7, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Certain places carry meaning for more than one tradition, and several have been contested for centuries: Jerusalem, Makkah, Hebron and Mount Sinai chief among them.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"jerusalem"} -->
<h2 class="wp-block-heading" id="jerusalem">Jerusalem</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sacred to all three traditions. For Jews it is the city of the Temple, whose Western Wall remains a place of prayer. For Christians it is where Jesus was crucified and, they believe, rose from the dead; the Church of the Holy Sepulchre marks the site. For Muslims it holds al-Masjid al-Aqṣā (<span lang="ar" dir="rtl">المسجد الأقصى</span>, the Farthest Mosque) and the Dome of the Rock, associated with the Prophet's Night Journey. Read more in <a href="/journal/jerusalem-in-three-traditions/">Jerusalem in Three Traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="jerusalem-panorama" alt="The Old City of Jerusalem from the Mount of Olives, with the Dome of the Rock above the walls" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"hebron"} -->
<h2 class="wp-block-heading" id="hebron">Hebron</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Cave of the Patriarchs, known to Muslims as the Ibrahimi Mosque, is by tradition the burial place of <a href="/journal/who-was-abraham/">Abraham</a>, Sarah, Isaac, Rebekah, Jacob and Leah. Jews, Christians and Muslims have all venerated the site.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-hebron" alt="The shrine over the Cave of the Patriarchs in Hebron" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"bethlehem"} -->
<h2 class="wp-block-heading" id="bethlehem">Bethlehem</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The traditional birthplace of Jesus, marked by the Church of the Nativity, and in the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a> the home of <a href="/reference/figures/#david">David</a>'s family.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"nazareth"} -->
<h2 class="wp-block-heading" id="nazareth">Nazareth</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The town in Galilee where Jesus grew up. The Basilica of the Annunciation recalls the angel's message to Mary.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mount-sinai"} -->
<h2 class="wp-block-heading" id="mount-sinai">Mount Sinai</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The mountain where, according to the Hebrew Bible, <a href="/reference/figures/#moses">Moses</a> received the law. Tradition identifies it with Jebel Musa in the southern Sinai Peninsula, beside the Monastery of Saint Catherine, although scholars have proposed other locations.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-sinai" alt="The granite peaks of Mount Sinai in the south of the Sinai Peninsula" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-jordan-river"} -->
<h2 class="wp-block-heading" id="the-jordan-river">The Jordan River</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In the Hebrew Bible the Israelites cross the Jordan to enter the land promised to Abraham. In the Gospels John baptises in its waters, and Jesus among those who come to him. In Islamic history the Jordan valley holds the shrines of several Companions of the Prophet, among them Abū ʿUbaydah ibn al-Jarrāḥ. Mandaeans call the running water of their baptisms <em>yardna</em>, a word most scholars take from the Jordan, although E. S. Drower doubted the connection.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="jordan-river" alt="The Jordan River at Qasr al-Yahud, the traditional site of the baptisms performed by John" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"makkah"} -->
<h2 class="wp-block-heading" id="makkah">Makkah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Written Mecca in most English sources, Makkah is the birthplace of Muhammad and the holiest city in <a href="/religions/islam/">Islam</a>. At its centre stands the Kaaba, which Muslims believe Abraham and <a href="/reference/figures/#ishmael">Ishmael</a> built, and toward which Muslims pray. Makkah is the destination of the ḥajj.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="place-mecca" alt="Pilgrims around the Station of Abraham at the Great Mosque in Makkah" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"madinah"} -->
<h2 class="wp-block-heading" id="madinah">Madinah</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Written Medina in most English sources, Madinah is the city to which Muhammad migrated in 622 and where he is buried. The Prophet's Mosque makes Madinah the second holiest city in Islam.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Eric Segelberg, Maṣbūtā: Studies in the Ritual of the Mandaean Baptism (Uppsala: Almqvist &amp; Wiksells, 1958), p. 38 and n. 2. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:glossary', 'type' => 'page', 'slug' => 'glossary', 'title' => 'Glossary', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Key terms from Judaism, Mandaeism, Christianity and Islam, defined in plain language.', 'description' => 'Plain-language definitions of key terms from Judaism, Mandaeism, Christianity and Islam. Look up a term.', 'menu_order' => 8, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Brief definitions of terms used throughout. Arabic and Hebrew terms are given in transliteration.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"terms"} -->
<h2 class="wp-block-heading" id="terms">Terms</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><strong>Abrahamic religions</strong>: traditions that trace a spiritual or historical link to Abraham: <a href="/religions/judaism/">Judaism</a>, <a href="/religions/christianity/">Christianity</a>, Islam and the far smaller Mandaeism. The phrase itself dates from the middle of the twentieth century.</li>
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
<li><strong>Mandaeism</strong>: the Gnostic religion of the Mandaeans of Iraq and Iran, whose greatest prophet is <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist</a>.</li>
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
ABR_SEED,
		),
		array(
			'key' => 'page:comparisons', 'type' => 'page', 'slug' => 'comparisons', 'title' => 'Comparative studies', 'parent' => 'page:knowledge-base',
			'excerpt' => 'How Judaism, Mandaeism, Christianity and Islam approach God, scripture, prophecy, law and the afterlife.', 'description' => 'How the traditions approach God, scripture, prophecy, law and the afterlife. Compare them side by side.', 'menu_order' => 9, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Comparison helps readers see where the Abrahamic traditions agree and where they part ways. It works best when each tradition is described in its own terms before any contrast is drawn.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-category-itself"} -->
<h2 class="wp-block-heading" id="the-category-itself">The category itself</h2>
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

<!-- wp:heading {"anchor":"god"} -->
<h2 class="wp-block-heading" id="god">God</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>All four traditions affirm one God, creator of the world. Mandaeism calls God the Great Life and teaches a dualism of light and darkness that the others do not share. <a href="/religions/judaism/">Judaism</a> expresses this in the Shema. <a href="/religions/christianity/">Christianity</a> affirms one God in three persons. Islam's doctrine of <em>tawḥīd</em> (<span lang="ar" dir="rtl">توحيد</span>, oneness) stresses God's absolute unity and rejects any partner to God. Jewish and Muslim theologians have long recognised how closely their understandings of divine unity align, and medieval thinkers in both traditions developed their arguments in conversation with each other. See <a href="/journal/how-the-abrahamic-religions-understand-monotheism/">How the Abrahamic Religions Understand Monotheism</a>.</p>
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
<p>Each tradition orders the prophets differently, and each order carries an argument. Jewish teaching holds that prophecy ceased in antiquity. Christian teaching reads the prophets as pointing towards Jesus. Islamic teaching describes a succession of messengers sent to every people, carrying one message whose law developed with circumstances and sealed by Muhammad; on that account the earlier communities received the same religion and departed from it.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Mandaeans count a line from Adam to Aram that closes with <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist</a>, and place the founders of the other traditions outside it.</p>
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
<p>Mandaeism describes the judgement as a journey. After death the soul passes through the <em>maṭarātā</em> (watch-houses), where it is purified, and reaches the scales of Abathur, where its deeds are weighed against the soul of Shitil, the purest of human souls. A soul found worthy crosses by a ship of light to the World of Light.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The front page carries a shorter version of this <a href="/#comparison">comparison</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">For the periods behind these differences, see the <a href="/reference/timeline/">History and timeline</a>; for short answers to common questions, see the <a href="/reference/faq/">FAQ</a>.</p>
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
<li id="note-3">Qur'an 2:135; 3:65-67. <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ismaʿil Raji al Faruqi, in Wing-tsit Chan, Ismaʿil Raji al Faruqi, Joseph M. Kitagawa and P. T. Raju, comps., The Great Asian Religions: An Anthology (New York: Macmillan, 1969), pp. 323, 326. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), pp. 197-199. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:guides', 'type' => 'page', 'slug' => 'religions', 'title' => 'Religions', 'parent' => '',
			'excerpt' => 'Introductions to Judaism, Mandaeism, Christianity and Islam, the traditions of the Abrahamic family.', 'description' => 'Introductions to Judaism, Mandaeism, Christianity and Islam, the four Abrahamic traditions. Choose one to begin.', 'menu_order' => 10, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
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
ABR_SEED,
		),
		array(
			'key' => 'page:research', 'type' => 'page', 'slug' => 'research', 'title' => 'Research', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Approaches, methods and source-handling for the academic study of the Abrahamic religions.', 'description' => 'Methods and source handling for studying the Abrahamic religions fairly. Read our research approach.', 'menu_order' => 11, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The academic study of religion draws on several disciplines: textual criticism, comparative history, archaeology and anthropology among them, each with its own methods and limits.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"approaches"} -->
<h2 class="wp-block-heading" id="approaches">Approaches</h2>
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
ABR_SEED,
		),
		array(
			'key' => 'page:about', 'type' => 'page', 'slug' => 'about', 'title' => 'About', 'parent' => '',
			'excerpt' => 'Abrahamic Religions is an independent educational platform on Judaism, Mandaeism, Christianity and Islam.', 'description' => 'Why Abrahamic Religions exists, how it treats each tradition, and who writes it. Read about our purpose.', 'menu_order' => 12, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Abrahamic Religions is an independent educational platform on the histories, scriptures, beliefs and practices of Judaism, Mandaeism, Christianity and Islam.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"our-purpose"} -->
<h2 class="wp-block-heading" id="our-purpose">Our purpose</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abrahamic Religions exists to introduce the Abrahamic religions and their history, and to give the reader what is needed to decide which among them is true. That question is the reason it was made. We therefore set out what each tradition teaches, where its claims come from, and how they stand when examined, and we leave the conclusion to the reader.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>We write for students, teachers, researchers and curious readers who want clear, well-sourced information. Where a question turns on the wording of a text, we go to the languages in which it was written.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"which-religions-we-treat"} -->
<h2 class="wp-block-heading" id="which-religions-we-treat">Which religions we treat</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Judaism, Mandaeism, Christianity and Islam are the four traditions treated here. The first three are the largest and share Abraham as their father in faith. Mandaeism is the smallest and the oldest surviving Gnostic religion, and it shares the prophetic line from Adam to Shem, the Aramaic world of late antiquity and, since the seventh century, recognition as the Sabians named in the Qur'an. Other communities are sometimes described as Abrahamic, and we leave them aside: their claim on Abraham runs through one of the traditions above.</p>
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
<p>Questions, corrections and suggestions are welcome through our <a href="/about/contact/">Contact</a> page.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:editorial-policy', 'type' => 'page', 'slug' => 'editorial-policy', 'title' => 'Editorial policy', 'parent' => 'page:about',
			'excerpt' => 'The standards of accuracy, sourcing and correction that govern content on Abrahamic Religions.', 'description' => 'Our standards of accuracy, sourcing, language and correction. Read the Abrahamic Religions editorial policy.', 'menu_order' => 13, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Content on Abrahamic Religions is prepared, reviewed and corrected under the following principles.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"describing-traditions"} -->
<h2 class="wp-block-heading" id="describing-traditions">Describing traditions</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Each tradition is first described in its own terms, using the language its adherents use. Where traditions disagree, we set out each position together with the reasons given for it. Where an article reaches a conclusion of its own, the evidence comes first and the conclusion is marked as ours. Historical findings are presented as findings, with their limits stated.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"accuracy"} -->
<h2 class="wp-block-heading" id="accuracy">Accuracy</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Articles draw on scripture, established scholarship and the teaching of the traditions themselves. Claims about dates, numbers and events are checked before publication. Where scholars disagree, we say so.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"language-and-conventions"} -->
<h2 class="wp-block-heading" id="language-and-conventions">Language and conventions</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li>Dates use BCE and CE.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Arabic and Hebrew terms appear in transliteration with a translation on first use.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Names follow common English usage, with the form used in other traditions noted where helpful.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"corrections"} -->
<h2 class="wp-block-heading" id="corrections">Corrections</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We correct factual errors as soon as we confirm them and note significant corrections at the end of the article. To report an error, use the <a href="/about/contact/">Contact</a> page.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"editorial-responsibility"} -->
<h2 class="wp-block-heading" id="editorial-responsibility">Editorial responsibility</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Editorial decisions rest with the editors of Abrahamic Religions. Suggestions from readers are welcome and are weighed on their merits.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:contact', 'type' => 'page', 'slug' => 'contact', 'title' => 'Contact', 'parent' => 'page:about',
			'excerpt' => 'How to reach the editors of Abrahamic Religions with questions, corrections and suggestions.', 'description' => 'Send questions, corrections and suggestions to the Abrahamic Religions editors. Find out how to reach us.', 'menu_order' => 14, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>We welcome questions, corrections and suggestions from readers.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"writing-to-us"} -->
<h2 class="wp-block-heading" id="writing-to-us">Writing to us</h2>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[abr_contact_email]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>When reporting an error, please include the page address and the passage concerned. We read every message, although we cannot answer questions seeking personal religious rulings or advice.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"newsletter"} -->
<h2 class="wp-block-heading" id="newsletter">Newsletter</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>To receive new articles and explainers, use the sign-up form at the foot of the <a href="/#newsletter">home page</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:privacy-policy', 'type' => 'page', 'slug' => 'privacy-policy', 'title' => 'Privacy policy', 'parent' => '',
			'excerpt' => 'How Abrahamic Religions handles information about visitors.', 'description' => 'What Abrahamic Religions collects, which cookies it sets and how to request your data. Read our privacy policy.', 'menu_order' => 15, 'special' => 'privacy', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Abrahamic Religions collects a limited amount of information about visitors, explained below. Last revised in 2026.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"information-we-collect"} -->
<h2 class="wp-block-heading" id="information-we-collect">Information we collect</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><strong>Server logs.</strong> Like most websites, our host records technical data such as IP addresses, browser type, referring pages and the time of each request, for security and maintenance. This data is not linked to anything that identifies you personally.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Cookies.</strong> WordPress may set cookies for visitors who sign in or leave a comment. The site sets no advertising cookies and carries no advertising network.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Analytics.</strong> Where analytics are enabled, visits are measured in aggregate with Google Analytics, which sets its own cookies under its own terms. Your browser settings can block them.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Comments.</strong> If comments are open and you leave one, we store your name, email address and comment.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Messages.</strong> If you write to us, we keep your message and address so that we can reply.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Newsletter.</strong> If you subscribe, your email address is handled by our mailing service under its own privacy terms.</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><strong>Donations.</strong> Payments are handled by the payment provider named on the <a href="/donate/">Donate</a> page. We receive confirmation of a gift and never see your card or account details.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"anchor":"embedded-content"} -->
<h2 class="wp-block-heading" id="embedded-content">Embedded content</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Pages may include content from other websites, such as videos. Those sites may collect data about you as if you had visited them directly.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"your-rights"} -->
<h2 class="wp-block-heading" id="your-rights">Your rights</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>You may ask us to export or erase personal data we hold about you. Use the <a href="/about/contact/">Contact</a> page to make a request, and we will respond within a reasonable period.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"changes"} -->
<h2 class="wp-block-heading" id="changes">Changes</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Any change to how visitor information is handled will be reflected in a later effective date above.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:terms', 'type' => 'page', 'slug' => 'terms', 'title' => 'Terms & conditions', 'parent' => '',
			'excerpt' => 'The terms and conditions that apply to the use of the Abrahamic Religions website.', 'description' => 'The terms and conditions for using Abrahamic Religions: accuracy, copyright and external links. Read them here.', 'menu_order' => 16, 'special' => '', 'since' => 1,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Use of Abrahamic Religions is subject to the following terms and conditions.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"educational-purpose"} -->
<h2 class="wp-block-heading" id="educational-purpose">Educational purpose</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The content is provided for general education. It does not constitute religious, legal or professional advice.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"accuracy"} -->
<h2 class="wp-block-heading" id="accuracy">Accuracy</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We work to keep the content accurate and up to date, but we make no warranty that it is complete or free of error. See our <a href="/about/editorial-policy/">Editorial policy</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"copyright"} -->
<h2 class="wp-block-heading" id="copyright">Copyright</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Unless stated otherwise, the text belongs to Abrahamic Religions. You may quote short passages with attribution and a link to the source page. Reproducing whole articles requires permission.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"external-links"} -->
<h2 class="wp-block-heading" id="external-links">External links</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Links to other websites are provided for convenience. We are not responsible for their content.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"changes"} -->
<h2 class="wp-block-heading" id="changes">Changes</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We may revise these terms and conditions at any time. Continued use of the site means acceptance of the current version.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:knowledge-base', 'type' => 'page', 'slug' => 'reference', 'title' => 'Reference', 'parent' => '',
			'excerpt' => 'Reference material on the scriptures, figures, places, history and vocabulary of the Abrahamic traditions.', 'description' => 'Reference material on scriptures, figures, places, history and key terms. Explore the Abrahamic Religions reference section.', 'menu_order' => 20, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Reference section collects material for readers who want to look something up or study a subject in depth. Each section is written for a general audience and linked to related articles.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_child_pages]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>For introductions to each tradition, start with <a href="/religions/">Religions</a>.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:timeline', 'type' => 'page', 'slug' => 'timeline', 'title' => 'History and timeline', 'parent' => 'page:knowledge-base',
			'excerpt' => 'A chronological overview of the Abrahamic traditions from the ancient Near East to the present.', 'description' => 'From the ancient Near East to the modern era, the key periods of four traditions. Follow the timeline.', 'menu_order' => 21, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>This timeline outlines the main periods in the history of Judaism, Mandaeism, Christianity and Islam. Dates before the first millennium BCE rest largely on tradition and are approximate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="ur-ziggurat" alt="The restored ziggurat of Ur in southern Iraq, built around 2100 BCE" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ancient-near-east-c-2000-to-1200-bce"} -->
<h2 class="wp-block-heading" id="ancient-near-east-c-2000-to-1200-bce">Ancient Near East (c. 2000 to 1200 BCE)</h2>
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
<p>The modern period brought new religious movements, colonial rule and its end, and mass migration. During the Holocaust, Nazi Germany and its collaborators murdered some six million Jews. The State of Israel was established in 1948, and the war that followed displaced a large Palestinian Arab population. The Second Vatican Council (1962 to 1965) reshaped Catholic relations with Jews and Muslims, and organised <a href="/journal/interfaith-dialogue-in-the-modern-era/">interfaith dialogue</a> grew worldwide. The violence that followed 2003 drove most Mandaeans from Iraq, and the community now lives chiefly in diaspora.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>For a closer look at single periods, see the <a href="/journal/">Journal</a> section.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:faq', 'type' => 'page', 'slug' => 'faq', 'title' => 'Frequently asked questions', 'parent' => 'page:knowledge-base',
			'excerpt' => 'Short answers to common questions about Judaism, Mandaeism, Christianity, Islam and their shared heritage.', 'description' => 'Short answers to common questions about Judaism, Mandaeism, Christianity and Islam. Find your answer.', 'menu_order' => 22, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Short answers to the questions readers ask most often. Each answer links to a fuller treatment elsewhere on the site.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-are-the-abrahamic-religions"} -->
<h2 class="wp-block-heading" id="what-are-the-abrahamic-religions">What are the Abrahamic religions?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The term refers to religious traditions that trace a spiritual or historical connection to Abraham: <a href="/religions/judaism/">Judaism</a>, <a href="/religions/christianity/">Christianity</a>, Islam and the far smaller Mandaeism. See <a href="/religions/">Religions</a>.</p>
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
<p>All four affirm one God. Mandaeans call God Hayyi Rabbi, the Great Life, and set the World of Light against a World of Darkness, a dualism the other three do not share. Beyond that each describes God differently, and believers and theologians disagree about how far their understandings coincide. See <a href="/journal/how-the-abrahamic-religions-understand-monotheism/">How the Abrahamic Religions Understand Monotheism</a>.</p>
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

<!-- wp:heading {"anchor":"how-can-i-suggest-a-correction"} -->
<h2 class="wp-block-heading" id="how-can-i-suggest-a-correction">How can I suggest a correction?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Use the <a href="/about/contact/">Contact</a> page. Our <a href="/about/editorial-policy/">Editorial policy</a> explains how we handle corrections.</p>
<!-- /wp:paragraph -->
ABR_SEED,
		),
		array(
			'key' => 'page:topics', 'type' => 'page', 'slug' => 'topics', 'title' => 'Topics', 'parent' => 'page:articles',
			'excerpt' => 'Browse articles on Abrahamic Religions by topic, from history and scripture to philosophy and interfaith studies.', 'description' => 'History, scripture, theology, culture, philosophy and more. Browse the Abrahamic Religions journal by topic.', 'menu_order' => 23, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Every article in the Journal belongs to one or more topics. Choose a topic to see its articles.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_topic_index]
<!-- /wp:shortcode -->
ABR_SEED,
		),
		array(
			'key' => 'page:site-map', 'type' => 'page', 'slug' => 'sitemap', 'title' => 'Sitemap', 'parent' => '',
			'excerpt' => 'A complete, organised list of the pages and articles on Abrahamic Religions.', 'description' => 'Every page and article on Abrahamic Religions, organised by subject. Use the sitemap to find your way.', 'menu_order' => 24, 'special' => '', 'since' => 2,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Every section of Abrahamic Religions, organised by subject.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[abr_site_map]
<!-- /wp:shortcode -->
ABR_SEED,
		),
		array(
			'key' => 'page:donate', 'type' => 'page', 'slug' => 'donate', 'title' => 'Donate', 'parent' => '',
			'excerpt' => 'Support Abrahamic Religions and help keep its reference pages and Journal free to read.', 'description' => 'Help keep Abrahamic Religions free to read by supporting its research and writing. Make a donation today.', 'menu_order' => 25, 'special' => '', 'since' => 7,
			'content' => <<<'ABR_SEED'
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
ABR_SEED,
		),
		array(
			'key' => 'page:dmca', 'type' => 'page', 'slug' => 'dmca', 'title' => 'Copyright and DMCA', 'parent' => '',
			'excerpt' => 'How to report copyright infringement on Abrahamic Religions, and what happens after a notice.', 'description' => 'How to report copyright infringement on Abrahamic Religions and what follows a notice. Read the DMCA procedure.', 'menu_order' => 26, 'special' => '', 'since' => 8,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Abrahamic Religions respects the rights of copyright owners. If any content infringes your copyright, the procedure below sets out how to tell us.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notice-of-infringement"} -->
<h2 class="wp-block-heading" id="notice-of-infringement">Notice of infringement</h2>
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
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'page:thank-you', 'type' => 'page', 'slug' => 'thank-you', 'title' => 'Thank you', 'parent' => 'page:donate',
			'excerpt' => 'Your gift keeps Abrahamic Religions free to read. Here is what happens next.', 'description' => 'Your gift keeps Abrahamic Religions free to read and free of advertising. See what happens next.', 'menu_order' => 27, 'special' => '', 'since' => 8,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Thank you for supporting Abrahamic Religions. Your gift pays for the research and writing behind each page and keeps the site online, free to read and free of advertising.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"your-receipt"} -->
<h2 class="wp-block-heading" id="your-receipt">Your receipt</h2>
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
ABR_SEED,
		),
		array(
			'key' => 'page:tanakh', 'type' => 'page', 'slug' => 'tanakh', 'title' => 'The Tanakh', 'parent' => 'page:sacred-texts',
			'excerpt' => 'The twenty-four books of the Hebrew Bible with their Hebrew names, arranged as Torah, Nevi’im and Ketuvim.', 'description' => 'The twenty-four books of the Hebrew Bible with their Hebrew names and order. Explore the Tanakh book by book.', 'menu_order' => 1, 'special' => '', 'since' => 13,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Hebrew Bible is known in Judaism as the Tanakh (<span lang="he" dir="rtl">תנ״ך</span>, an acronym of its three parts): Torah, Nevi'im and Ketuvim. It contains twenty-four books in the Jewish reckoning. Christian Old Testaments hold the same material, counted as thirty-nine books, because Samuel, Kings, Chronicles and Ezra-Nehemiah are each split in two and the Twelve Prophets are counted separately.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="tanakh" alt="Hebrew text in three columns on a folio of the Leningrad Codex, the oldest complete manuscript of the Hebrew Bible" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"torah"} -->
<h2 class="wp-block-heading" id="torah">Torah</h2>
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
ABR_SEED,
		),
		array(
			'key' => 'page:bible', 'type' => 'page', 'slug' => 'bible', 'title' => 'The Christian Bible', 'parent' => 'page:sacred-texts',
			'excerpt' => 'The books of the Christian Bible and how the canon differs between Protestant, Catholic, Orthodox and Ethiopian churches.', 'description' => 'Every book of the Christian Bible, and how the canon differs between churches. Compare the lists side by side.', 'menu_order' => 2, 'special' => '', 'since' => 13,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Christians share one New Testament of twenty-seven books and differ over the Old Testament. The disagreement concerns a set of books written in the last centuries BCE, preserved in Greek in the Septuagint, which Catholics call deuterocanonical and Protestants call the Apocrypha. Counting them gives 66 books in Protestant Bibles, 73 in Catholic Bibles, commonly 76 to 79 in the Orthodox churches, and 81 in the Ethiopian Orthodox Tewahedo canon.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="christian-bible" alt="Greek uncial columns of the Gospel of Mark in the fifth-century Codex Alexandrinus" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-old-testament-held-in-common"} -->
<h2 class="wp-block-heading" id="the-old-testament-held-in-common">The Old Testament held in common</h2>
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
ABR_SEED,
		),
		array(
			'key' => 'page:quran', 'type' => 'page', 'slug' => 'quran', 'title' => 'The Qur’an', 'parent' => 'page:sacred-texts',
			'excerpt' => 'All 114 surahs of the Qur’an with their Arabic names, meanings, verse counts and place of revelation.', 'description' => 'All 114 surahs with Arabic names, meanings and verse counts. Browse the chapters of the Qur’an in order.', 'menu_order' => 3, 'special' => '', 'since' => 13,
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Qur'an (<span lang="ar" dir="rtl">قرآن</span>, "recitation") contains 114 chapters, called surahs (<span lang="ar" dir="rtl">سورة</span>, chapter), made up of verses called ayahs (<span lang="ar" dir="rtl">آية</span>, "sign"). Muslims hold it to be the speech of God revealed to the Prophet Muhammad in Arabic over some twenty-three years, preserved in writing and in the memory of reciters in every generation.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"how-the-text-is-arranged"} -->
<h2 class="wp-block-heading" id="how-the-text-is-arranged">How the text is arranged</h2>
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
ABR_SEED,
		),
		array(
			'key' => 'page:mandaeism', 'type' => 'page', 'slug' => 'mandaeism', 'title' => 'Mandaeism', 'parent' => 'page:guides',
			'excerpt' => 'The Mandaeans of Iraq and Iran, their scriptures and rites, and their identification with the Sabians of the Qur’an.', 'description' => 'The Mandaeans of Iraq and Iran, their scriptures and rites, and the Sabians of the Qur’an. Read the introduction.', 'menu_order' => 4, 'special' => '', 'since' => 14,
			'content' => <<<'ABR_SEED'
<!-- wp:shortcode -->
[abr_darfash]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>Mandaeism is the religion of the Mandaeans, a community of southern Iraq and south-western Iran whose rituals turn on flowing water and whose greatest teacher is John the Baptist, known to them as Yahya Yuhana and to the Qur'an as <em>Yaḥyā ibn Zakariyyā</em> (<span lang="ar" dir="rtl">يحيى بن زكريا</span>, John son of Zechariah). Perhaps sixty to seventy thousand Mandaeans remain, most of them now in diaspora. It is the smallest of the four traditions treated here, and the oldest surviving Gnostic religion in the world.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="mandaeism" alt="A Mandaean immersing in the Karun River at Ahvaz during masbuta, the rite of baptism in flowing water" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"origins"} -->
<h2 class="wp-block-heading" id="origins">Origins</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaean tradition traces the religion to Adam, who is held to have received the first revelation. The community's own account of its history, preserved in a scroll copied and recopied by its priests, describes a departure from <a href="/journal/jerusalem-in-three-traditions/">Jerusalem</a>: sixty thousand Nasoraeans, it says, entered the Median hills, where they were free of foreign rule and built the cult huts they call <em>bimandia</em>, under a king the text names Ardban, the Artabanus of the Parthian line.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Copyists' colophons in the scriptures allow scholars to trace an unbroken chain of transmission to the second or third century, one of the longest attested for any religious literature. Scholars divide over whether the origins lie in Palestine, as the community's own histories say, or in Mesopotamia itself.</p>
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
<p>The prophetic line runs Adam, Abel, Seth, Enosh, Noah, Shem and Aram, and it closes with <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist</a>, whom Mandaeans regard as the greatest and the last. These are figures of the <a href="/reference/sacred-texts/tanakh/">Hebrew Bible</a>, and they place the community in the same prophetic lineage from which the other three traditions draw.</p>
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
<p>The community's own scroll records the meeting. It tells how one Anush son of Danqa came before the Arab ruler and explained the faith of his people, with the result that the Muslims were not permitted to harm the Nasoraeans living under that government.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> In the form the account takes elsewhere, Anush presented the Ginza Rabba to the Muslim authorities and named John the Baptist as the chief prophet of his community. The Mandaeans were recognised as the Sabians of the Qur'an, and so as <em>ahl al-kitāb</em> (<span lang="ar" dir="rtl">أهل الكتاب</span>, people of the book), a standing that carried protection, the right to their own law, and the survival of the community under Muslim rule for fourteen centuries. That identification has held to the present day, and it is the reason a small Gnostic community of late antiquity still exists.</p>
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
<li id="note-4">Qur'an 2:62; 5:69; 22:17. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:who-was-abraham', 'photo' => array( 'name' => 'ur-ziggurat', 'alt' => 'The ziggurat of Ur in southern Iraq, the city Genesis names as the home of Abraham' ), 'type' => 'post', 'slug' => 'who-was-abraham', 'title' => 'Who was Abraham?',
			'excerpt' => 'The historical and theological figure of Abraham across the traditions, and why Mandaeism parts from him.', 'description' => 'Abraham in Genesis, rabbinic tradition, the New Testament and the Qur’an. Read who Abraham was and why he matters.', 'categories' => array( 'history', 'religion' ), 'days_ago' => 160, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Abraham stands at the head of three religious traditions. Jews call him <em>Avraham avinu</em>, "our father Abraham"; Christians honour him as the father of all who believe; Muslims revere Ibrāhīm as a prophet and the builder of the Kaaba. Who was he, and why does he matter so much?</p>
<!-- /wp:paragraph -->

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
<p>The <a href="/reference/sacred-texts/quran/">Qur'an</a> calls Ibrāhīm a <em>ḥanīf</em> (<span lang="ar" dir="rtl">حنيف</span>, pure monotheist) and <em>khalīl Allāh</em> (<span lang="ar" dir="rtl">خليل الله</span>, friend of God). It describes his rejection of his people's idols, his trial by fire, and his raising of the foundations of the Kaaba in <a href="/reference/places/#makkah">Makkah</a> with Ismāʿīl. Because the Torah and the Gospel came after him, the Qur'an holds that he belonged to neither community and calls him a <em>muslim</em>, one who submitted to God.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Qur'an does not name the son in the sacrifice narrative; most later Muslim scholars identified him as Ismāʿīl. The annual festival of <em>ʿĪd al-Aḍḥā</em> (<span lang="ar" dir="rtl">عيد الأضحى</span>, the festival of sacrifice) commemorates Abraham's obedience, and the Qur'an calls Muslims to follow his path, a theme treated in <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur'an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"abraham-in-mandaean-tradition"} -->
<h2 class="wp-block-heading" id="abraham-in-mandaean-tradition">Abraham in Mandaean tradition</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Of the four traditions, Mandaeism alone does not honour Abraham. Its line of prophets runs from Adam through Seth, Noah and Shem and closes with <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist</a>; Abraham has no place in it, and some Mandaean texts describe him as a former priest of the community who broke away from it. The Mandaeans belong to the Abrahamic family by the prophets they share with it and by their history, and they part from the others at the figure the family is named after. See <a href="/religions/mandaeism/">Mandaeism</a>.</p>
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

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/who-was-kedar/">Kedar, the Arabs and the prophets</a> and <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>, <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>.</p>
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
<li id="note-4">Qur'an 2:127; 21:51-70; 3:67. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:how-the-abrahamic-religions-understand-monotheism', 'photo' => array( 'name' => 'ten-commandments', 'alt' => 'The Ten Commandments in Deuteronomy on a page of the Aleppo Codex' ), 'type' => 'post', 'slug' => 'how-the-abrahamic-religions-understand-monotheism', 'title' => 'How the Abrahamic religions understand monotheism',
			'excerpt' => 'A comparative look at the concept of one God in Judaism, Mandaeism, Christianity and Islam.', 'description' => 'The Shema, the Trinity, tawhid and the Great Life of the Mandaeans compared. Read how each tradition sees God.', 'categories' => array( 'theology', 'religion' ), 'days_ago' => 130, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Judaism, Mandaeism, Christianity and Islam each confess one God. Yet they express that belief in different ways, and the differences have shaped centuries of debate.</p>
<!-- /wp:paragraph -->

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
<p>The traditions agree that God is the sole creator, is just and merciful, speaks to humanity through prophets, and will judge the world. Much <a href="/journal/interfaith-dialogue-in-the-modern-era/">interfaith conversation</a> starts from these shared affirmations while taking the differences seriously.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Judaism and Islam state the principle in its least qualified form: one God, without partner or likeness. The Qur'an adds a claim of its own, presenting that confession as the faith of <a href="/journal/who-was-abraham/">Abraham</a> himself, which is why Muslims describe their religion as the restoration of the monotheism from which the whole family takes its name. See <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur'an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/prayer-across-the-abrahamic-traditions/">Prayer across the Abrahamic traditions</a> and <a href="/journal/faith-and-reason-in-medieval-thought/">Faith and reason in medieval Jewish, Christian and Muslim thought</a>, <a href="/journal/al-ghazali-ibn-rushd-and-the-limits-of-reason/">Al-Ghazali, Ibn Rushd and the limits of reason</a>.</p>
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
			'key' => 'post:understanding-the-bible-and-the-quran-in-historical-context', 'photo' => array( 'name' => 'birmingham-quran', 'alt' => 'Early Qur\'anic leaves of the Birmingham manuscript in Hijazi script' ), 'type' => 'post', 'slug' => 'understanding-the-bible-and-the-quran-in-historical-context', 'title' => 'Understanding the Bible and the Qur’an in historical context',
			'excerpt' => 'How scholars approach the historical and literary settings of these sacred texts.', 'description' => 'How historians date and study the Bible and the Qur’an, and what believers make of it. Read the explainer.', 'categories' => array( 'scripture' ), 'days_ago' => 100, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Believers read scripture as revelation. Historians ask a further set of questions: when were these texts written down, by whom, in what circumstances, and how were they transmitted? The two ways of reading can inform each other.</p>
<!-- /wp:paragraph -->

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
<p>Muslim tradition holds that the <a href="/reference/sacred-texts/quran/">Qur'an</a> was revealed to Muhammad between about 610 and 632 CE, and that a standard written text was established under the caliph ʿUthmān around 650. Early manuscripts, some written on parchment that radiocarbon testing places in the seventh century, have allowed scholars to study the text's early history. Two leaves held by the University of Birmingham, carrying parts of sūrahs 18 to 20 in the early Hijazi script, were tested at Oxford in 2014: the parchment dates, with 95.4 per cent probability, to between 568 and 645 CE, a range that overlaps the lifetime of the Prophet.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The interval between the revelation and its earliest surviving copies is therefore a matter of decades. Muslim scholarship has its own long tradition of historical inquiry, including the study of <em>asbāb al-nuzūl</em> (<span lang="ar" dir="rtl">أسباب النزول</span>, occasions of revelation), the circumstances in which particular passages were revealed.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"reading-in-context"} -->
<h2 class="wp-block-heading" id="reading-in-context">Reading in context</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Historical context can illuminate a passage: the customs it assumes, the audience it addresses, the questions it answers. Traditions differ in how much weight they give such readings. For many believers, historical study deepens understanding of texts they hold to be revealed; for others, it raises questions that call for careful theological response.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>, <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist in four traditions</a> and <a href="/journal/what-archaeology-tells-us-about-the-ancient-near-east/">What archaeology tells us about the ancient Near East</a>, <a href="/journal/the-preservation-and-transmission-of-scripture/">The preservation and transmission of scripture</a> and <a href="/journal/mary-across-the-traditions/">Mary across the traditions</a>, <a href="/journal/paul-and-peter-two-missions/">Paul and Peter: two missions in the early church</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="papyrus52" alt="Papyrus 52, a fragment of the Gospel of John held by the John Rylands Library, among the earliest known New Testament manuscripts" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="codex-sinaiticus" alt="A page of the fourth-century Codex Sinaiticus, one of the earliest surviving manuscripts of the New Testament" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
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
<p class="abr-further">Further reading: <a href="/journal/interfaith-dialogue-in-the-modern-era/">Interfaith dialogue in the modern era</a>, <a href="/journal/what-archaeology-tells-us-about-the-ancient-near-east/">What archaeology tells us about the ancient Near East</a> and <a href="/journal/who-was-abraham/">Who was Abraham?</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="dome-of-rock" alt="The Dome of the Rock on the Temple Mount in Jerusalem" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Qur'an 17:1. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Qur'an 2:142-144. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:prayer-across-the-abrahamic-traditions', 'photo' => array( 'name' => 'prayer', 'alt' => 'A worshipper with raised arms against the evening sky' ), 'type' => 'post', 'slug' => 'prayer-across-the-abrahamic-traditions', 'title' => 'Prayer across the Abrahamic traditions',
			'excerpt' => 'Daily prayer in Judaism, Mandaeism, Christianity and Islam: times, forms and meanings.', 'description' => 'Daily prayer in Judaism, Mandaeism, Christianity and Islam: times, postures and meanings. Compare them.', 'categories' => array( 'culture' ), 'days_ago' => 50, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Prayer shapes the daily rhythm of believers in all four Abrahamic traditions. The forms differ, yet each tradition treats prayer as both a personal turning to God and a shared act of the community.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"jewish-prayer"} -->
<h2 class="wp-block-heading" id="jewish-prayer">Jewish prayer</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jewish law sets three daily services: <em>Shacharit</em> in the morning, <em>Mincha</em> in the afternoon and <em>Maariv</em> in the evening. At their centre is the <em>Amidah</em>, a series of blessings recited standing. Certain prayers require a <em>minyan</em>, a quorum of ten adults. The synagogue service follows the prayer book, and the Torah is read publicly on Sabbaths, festivals and certain weekdays.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"christian-prayer"} -->
<h2 class="wp-block-heading" id="christian-prayer">Christian prayer</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Christians pray privately and together. The Lord's Prayer, which the Gospels record Jesus teaching his disciples, is common to nearly all churches. Many Catholic, Orthodox and Anglican Christians keep a daily cycle of set prayers, such as the Liturgy of the Hours, and the Eucharist stands at the heart of worship. Protestant traditions place strong emphasis on personal prayer, hymns and the reading of scripture.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"muslim-prayer"} -->
<h2 class="wp-block-heading" id="muslim-prayer">Muslim prayer</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Muslims perform <em>ṣalāh</em> (<span lang="ar" dir="rtl">صلاة</span>, ritual prayer) five times daily: at dawn, midday, afternoon, sunset and night. Before praying they perform <em>wuḍūʾ</em> (<span lang="ar" dir="rtl">وضوء</span>, ablution), and they face the Kaaba in <a href="/reference/places/#makkah">Makkah</a>. Each prayer consists of cycles of standing, bowing, prostration and sitting, with recitation from the <a href="/reference/sacred-texts/quran/">Qur'an</a> in Arabic. On Fridays, Muslims gather for the congregational prayer, <em>jumuʿah</em> (<span lang="ar" dir="rtl">جمعة</span>, Friday prayer), with a sermon.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mandaean-prayer"} -->
<h2 class="wp-block-heading" id="mandaean-prayer">Mandaean prayer</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaean prayer, the <em>rahmi</em>, is said facing the North Star, behind which, in Mandaean belief, Abathur has his throne; the north is the direction of the World of Light. Each day of the week carries its own prayers, and a priest recites them before he baptises.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Baptism itself, repeated through life in running water, is the community's central act of worship. See <a href="/religions/mandaeism/">Mandaeism</a>.</p>
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
<p class="abr-further">Further reading: <a href="/journal/how-the-abrahamic-religions-understand-monotheism/">How the Abrahamic religions understand monotheism</a>, <a href="/journal/masbuta-baptism-in-running-water/">Masbuta: baptism in running water</a> and <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur’an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">E. S. Drower, The Mandaeans of Iraq and Iran (Oxford: Clarendon Press, 1937), p. 110. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:what-archaeology-tells-us-about-the-ancient-near-east', 'photo' => array( 'name' => 'megiddo', 'alt' => 'Tel Megiddo from the air, above the Jezreel Valley' ), 'type' => 'post', 'slug' => 'what-archaeology-tells-us-about-the-ancient-near-east', 'title' => 'What archaeology tells us about the ancient Near East',
			'excerpt' => 'Inscriptions, excavations and the limits of the evidence for the world of the Bible and early Islam.', 'description' => 'Inscriptions, excavations and the limits of the evidence for the biblical world. See what archaeology shows.', 'categories' => array( 'archaeology', 'history' ), 'days_ago' => 35, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Archaeology gives historians material evidence to set beside written sources. For the world of the Abrahamic scriptures, that evidence is rich in places and silent in others.</p>
<!-- /wp:paragraph -->

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

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a> and <a href="/journal/jerusalem-in-three-traditions/">Jerusalem in three traditions</a>, <a href="/journal/the-cairo-genizah/">The Cairo Genizah</a>.</p>
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
			'key' => 'post:faith-and-reason-in-medieval-thought', 'photo' => array( 'name' => 'cordoba', 'alt' => 'Horseshoe arches inside the Great Mosque of Córdoba' ), 'type' => 'post', 'slug' => 'faith-and-reason-in-medieval-thought', 'title' => 'Faith and reason in medieval Jewish, Christian and Muslim thought',
			'excerpt' => 'How medieval thinkers in all three traditions used Greek philosophy to reason about God.', 'description' => 'How medieval Jewish, Christian and Muslim thinkers reasoned about God. Read about their shared inheritance.', 'categories' => array( 'philosophy', 'theology' ), 'days_ago' => 20, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Between the ninth and the thirteenth centuries, Jewish, Christian and Muslim thinkers took up the philosophy of ancient Greece and asked how reason relates to revelation. Their conversation crossed religious and linguistic borders.</p>
<!-- /wp:paragraph -->

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

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/how-the-abrahamic-religions-understand-monotheism/">How the Abrahamic religions understand monotheism</a>, <a href="/journal/interfaith-dialogue-in-the-modern-era/">Interfaith dialogue in the modern era</a> and <a href="/journal/understanding-the-bible-and-the-quran-in-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/al-ghazali-ibn-rushd-and-the-limits-of-reason/">Al-Ghazali, Ibn Rushd and the limits of reason</a>.</p>
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
			'key' => 'post:interfaith-dialogue-in-the-modern-era', 'photo' => array( 'name' => 'place-hebron', 'alt' => 'The shrine over the Cave of the Patriarchs in Hebron, shared by a mosque and a synagogue' ), 'type' => 'post', 'slug' => 'interfaith-dialogue-in-the-modern-era', 'title' => 'Interfaith dialogue in the modern era',
			'excerpt' => 'How Jews, Christians and Muslims have sought understanding across religious lines since the nineteenth century.', 'description' => 'From Chicago in 1893 to church and Muslim initiatives today. Read how modern interfaith dialogue developed.', 'categories' => array( 'interfaith-studies' ), 'days_ago' => 8, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Encounters among Jews, Christians and Muslims are as old as the traditions themselves. Organised dialogue aimed at mutual understanding is largely a development of the last two centuries.</p>
<!-- /wp:paragraph -->

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

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/faith-and-reason-in-medieval-thought/">Faith and reason in medieval Jewish, Christian and Muslim thought</a>, <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a> and <a href="/journal/jerusalem-in-three-traditions/">Jerusalem in three traditions</a>, <a href="/journal/the-amman-message-and-a-common-word/">The Amman Message and A Common Word</a>.</p>
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
			'key' => 'post:millat-ibrahim', 'photo' => array( 'name' => 'hero-kaaba', 'alt' => 'Pilgrims surrounding the Kaaba in the Great Mosque of Makkah' ), 'type' => 'post', 'slug' => 'millat-ibrahim', 'title' => 'The path of Abraham in the Qur’an',
			'excerpt' => 'How the Qur’an defines the millat Ibrahim, the path of Abraham, and what it asks of its hearers.', 'description' => 'How the Qur’an defines the path of Abraham, and what it asks of its hearers. Read the passages in context.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 120, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Qur'an repeatedly calls its hearers to follow the <em>millat Ibrāhīm</em> (<span lang="ar" dir="rtl">ملة إبراهيم</span>, the path, or way, of Abraham). The phrase is worth examining, because the Qur'an supplies its own definition wherever it appears.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-command-and-its-wording"} -->
<h2 class="wp-block-heading" id="the-command-and-its-wording">The command and its wording</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Three passages carry the command directly. The first instructs the Prophet to follow the path of Abraham, "the true in faith", adding that he joined no partners with God.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The second answers those who invite others to become Jews or Christians by pointing instead to that same path.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The third repeats the instruction and describes Abraham as sound in faith and not among those who associate others with God.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
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
<p class="abr-further">Further reading: <a href="/journal/how-the-abrahamic-religions-understand-monotheism/">How the Abrahamic religions understand monotheism</a> and <a href="/journal/who-was-kedar/">Kedar, the Arabs and the prophets</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="jabal-al-nour" alt="Jabal al-Nour, near Makkah, the mountain holding the cave where Muhammad is said to have received the first revelation" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Qur'an 16:123. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:who-was-kedar', 'photo' => array( 'name' => 'dumat-al-jandal', 'alt' => 'Marid Castle at Dumat al-Jandal, the northern Arabian oasis the Assyrians knew as Adummatu' ), 'type' => 'post', 'slug' => 'who-was-kedar', 'title' => 'Kedar, the Arabs and the prophets',
			'excerpt' => 'Kedar in the Hebrew Bible, the Arab tribes of the north, and the figure the oracles point to.', 'description' => 'Kedar in the Hebrew Bible, the Arab tribes of the north, and later readings of the name. Read the full account.', 'categories' => array( 'history', 'scripture' ), 'days_ago' => 65, 'since' => 1, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Kedar is a minor name in the Hebrew Bible with a long afterlife in commentary. He appears as the second son of Ishmael, and his descendants, the Kedarites, were an Arab people of the northern Arabian desert.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> The interest of the name lies in what later readers made of it.</p>
<!-- /wp:paragraph -->

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

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/millat-ibrahim/">The path of Abraham in the Qur’an</a> and <a href="/journal/what-archaeology-tells-us-about-the-ancient-near-east/">What archaeology tells us about the ancient Near East</a>.</p>
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
<li id="note-1">Genesis 25:13; 1 Chronicles 1:29. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:john-the-baptist-in-four-traditions', 'photo' => array( 'name' => 'jordan-river', 'alt' => 'The Jordan River at Qasr al-Yahud, the traditional site of the baptisms performed by John' ), 'type' => 'post', 'slug' => 'john-the-baptist-in-four-traditions', 'title' => 'John the Baptist in four traditions',
			'excerpt' => 'The prophet of the Jordan in the Gospels, in Jewish memory, in the Qur\'an and in Mandaean tradition.', 'description' => 'John the Baptist in the Gospels, Josephus, the Qur\'an and Mandaean tradition. Read how four faiths remember him.', 'categories' => array( 'religion', 'scripture' ), 'days_ago' => 4, 'since' => 26, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>John the Baptist is the one figure whom Christianity, Islam and Mandaeism all honour as a prophet of God, and whom Jewish memory preserves through the historian Josephus. Each tradition tells his story from a different vantage. For Christians he prepares the way for Jesus; for Muslims he is Yaḥyā (<span lang="ar" dir="rtl">يحيى</span>, John), a prophet given wisdom as a child; for Mandaeans he is Yahya Yuhana, the greatest and the last of the prophets, and the teacher whose baptism they still perform.</p>
<!-- /wp:paragraph -->

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
<p>The <a href="/reference/sacred-texts/quran/">Qur'an</a> tells of Zakariyyā (<span lang="ar" dir="rtl">زكريا</span>, Zechariah) praying in old age for an heir and receiving the promise of a son named Yaḥyā, of whom God says that He had made no <em>samiyy</em> (<span lang="ar" dir="rtl">سمي</span>) for him before.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> The classical exegetes read the word two ways. Taken as a namesake, it means that no one before him had borne the name; taken as a peer, it means that no one before had been like him. Mujāhid and Saʿīd ibn Jubayr explained it as one like him, and Ibn ʿAbbās added that no barren woman had ever borne such a child. Al-Ṭabarī reported both readings and preferred the first.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> On either reading the name is distinct. Yaḥyā is formed from the Arabic root of life, while John renders the Hebrew Yoḥanan, which joins the divine name to a root meaning grace: two names from two different roots.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> The son is to confirm a word from God and to be honourable, chaste, and a prophet among the righteous.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> He is commanded to hold fast to the scripture and is given wisdom while still a child, together with tenderness, purity and devotion to his parents; peace is upon him on the day of his birth, the day of his death and the day he is raised alive.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup></p>
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
<p class="abr-further">Further reading: <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a> and <a href="/journal/understanding-the-bible-and-the-quran-in-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a> and <a href="/journal/mary-across-the-traditions/">Mary across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="galilee" alt="The Sea of Galilee, where the Gospels place much of Jesus’ ministry" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
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
<li id="note-5">Qur'an 19:2-7. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
<p>Immersion in water runs through all four traditions. Jewish law requires immersion in a <em>mikveh</em>, a ritual pool, for purity and for conversion. Christian baptism, received once, marks entry into the Church. <a href="/religions/islam/">Islam</a> prescribes <em>wuḍūʾ</em> (<span lang="ar" dir="rtl">وضوء</span>, ablution) before prayer and <em>ghusl</em> (<span lang="ar" dir="rtl">غسل</span>, full washing) after major impurity. Mandaeism alone makes a repeated baptism in running water, performed by a priest, the heart of its worship. See <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist in four traditions</a> and <a href="/religions/mandaeism/">Mandaeism</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/prayer-across-the-abrahamic-traditions/">Prayer across the Abrahamic traditions</a> and <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a>.</p>
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
			'key' => 'post:the-sabians-of-the-quran', 'photo' => array( 'name' => 'mandaeism', 'alt' => 'A Mandaean immersing in the Karun River at Ahvaz during masbuta' ), 'type' => 'post', 'slug' => 'the-sabians-of-the-quran', 'title' => 'The Sabians of the Qur’an',
			'excerpt' => 'The community the Qur’an names beside the Jews and the Christians, and how Muslim scholars answered the question of who they were.', 'description' => 'Who were the Sabians the Qur\'an names beside Jews and Christians? Read what exegetes, jurists and al-Biruni concluded.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 1, 'since' => 28, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Three times the Qur'an names a community called the <em>Ṣābiʾūn</em> (<span lang="ar" dir="rtl">الصابئون</span>, the Sabians), each time beside the Jews and the Christians.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> It never says who they were. Muslim scholars have asked the question since the first centuries of Islam, and the answers they gave show how the Qur'an's recognition of other communities was read, extended and applied.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup></p>
<!-- /wp:paragraph -->

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
<p class="abr-further">Further reading: <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist in four traditions</a> and <a href="/journal/interfaith-dialogue-in-the-modern-era/">Interfaith dialogue in the modern era</a>, <a href="/journal/the-preservation-and-transmission-of-scripture/">The preservation and transmission of scripture</a> and <a href="/journal/the-amman-message-and-a-common-word/">The Amman Message and A Common Word</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="al-biruni-manuscript" alt="A diagram of lunar phases from a manuscript of al-Biruni’s Kitab al-Tafhim" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Qur'an 2:62; 5:69; 22:17. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:the-king-and-the-pharaoh', 'photo' => array( 'name' => 'karnak', 'alt' => 'Columns of the Great Hypostyle Hall at Karnak, raised under the New Kingdom' ), 'type' => 'post', 'slug' => 'the-king-and-the-pharaoh', 'title' => 'The king and the Pharaoh',
			'excerpt' => 'Joseph served a king and Moses faced a Pharaoh: how the Qur’an’s two titles for the ruler of Egypt match the Egyptian record.', 'description' => 'The Qur\'an calls Joseph\'s ruler a king and Moses\' ruler Pharaoh. See what Egyptology says about the two titles.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 0, 'since' => 30, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Bible and the Qur'an both tell how Joseph rose to power in Egypt and how Moses confronted its ruler generations later. The two scriptures differ in a detail that looks small and turns out to be telling: what they call the king.</p>
<!-- /wp:paragraph -->

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
<p class="abr-further">Further reading: <a href="/journal/understanding-the-bible-and-the-quran-in-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/what-archaeology-tells-us-about-the-ancient-near-east/">What archaeology tells us about the ancient Near East</a> and <a href="/journal/who-was-abraham/">Who was Abraham?</a>, <a href="/journal/haman-in-the-quran/">Haman in the Qur’an</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="scarab" alt="The carved base of a Middle Kingdom Egyptian scarab amulet" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Qur'an 12:43, 12:50, 12:54, 12:72, 12:76. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:jesus-across-the-traditions', 'photo' => array( 'name' => 'holy-sepulchre', 'alt' => 'The Church of the Holy Sepulchre in Jerusalem, the traditional site of the crucifixion and resurrection' ), 'type' => 'post', 'slug' => 'jesus-across-the-traditions', 'title' => 'Jesus across the traditions',
			'excerpt' => 'Lord and Saviour, prophet and Messiah, or a pupil of John who departed from his teaching: how three traditions see Jesus.', 'description' => 'How Christianity, Judaism, Islam and Mandaeism each understand Jesus. Read the comparison across four traditions.', 'categories' => array( 'religion', 'theology' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Jesus is honoured across three of the four traditions treated here, though each gives him a different place. For Christians he is Lord and Saviour; for Muslims he is ʿĪsā (<span lang="ar" dir="rtl">عيسى</span>), a prophet and the Messiah, born of a virgin but not divine; Jewish tradition does not accept him as the Messiah it awaits. Mandaean texts remember him as a pupil of John who altered what John had taught.</p>
<!-- /wp:paragraph -->

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
<p>The Qur'an devotes a chapter to his mother and tells of his birth to Maryam, a virgin, by the command of God, without a father.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> It calls him <em>al-Masīḥ</em> (<span lang="ar" dir="rtl">المسيح</span>, the Messiah) and <em>Kalimat Allāh</em> (<span lang="ar" dir="rtl">كلمة الله</span>, a word from God), a prophet who spoke from the cradle and worked miracles by God's permission.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> It denies that God has a son, denies the crucifixion, and states that he was raised to God rather than killed: "they did not kill him, nor did they crucify him, but it was made to appear so to them."<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Classical exegetes disagree on the exact mechanism of the substitution and on whether Jesus died a natural death after being raised, but they agree that his execution as reported by the Gospels did not take place as described.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
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
<p class="abr-further">Further reading: <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist in four traditions</a>, <a href="/journal/mary-across-the-traditions/">Mary across the traditions</a> and <a href="/journal/who-was-abraham/">Who was Abraham?</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="manger-square" alt="Manger Square in Bethlehem, by tradition the site of the Nativity" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="beatitudes" alt="The Sea of Galilee seen from the Mount of Beatitudes, where the Gospels place much of Jesus’ teaching" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Matthew 1:18-25; Luke 1:26-38; 2:1-7. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Mark 1:14-15; 14-15; 16:1-8. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">The Nicene Creed (325, 381 CE); the Chalcedonian Definition (451 CE). <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Qur'an 19:16-22. <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:mary-across-the-traditions', 'photo' => array( 'name' => 'nativity', 'alt' => 'The Church of the Nativity in Bethlehem, the traditional site of the birth of Jesus' ), 'type' => 'post', 'slug' => 'mary-across-the-traditions', 'title' => 'Mary across the traditions',
			'excerpt' => 'The only woman named in the Qur\'an and the mother of God incarnate in Christian doctrine: Mary in scripture.', 'description' => 'Mary in the New Testament and the Qur\'an: the virgin birth, her honour, and where the two accounts diverge.', 'categories' => array( 'scripture', 'theology' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Mary is the one figure honoured by name in both the New Testament and the Qur'an, and the only woman the Qur'an names.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Christians venerate her as the mother of God incarnate; Muslims honour her as the mother of a prophet and, by the Qur'an's own words, exalted above the women of the worlds.</p>
<!-- /wp:paragraph -->

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
<p>The two oldest Qur'an manuscripts used elsewhere on this site both preserve part of her chapter: the Birmingham leaves carry its closing verses, and the Sana'a palimpsest's lower text includes an early version of its opening.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> See <a href="/journal/understanding-the-bible-and-the-quran-in-historical-context/">Understanding the Bible and the Qur'an in historical context</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"common-ground-and-disagreement"} -->
<h2 class="wp-block-heading" id="common-ground-and-disagreement">Common ground and disagreement</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Both scriptures agree that Mary conceived as a virgin, by divine action rather than a human father, and both hold her in the highest honour given to a woman in their respective traditions. They part over what that birth implies: for the New Testament it is a sign of the incarnation of God the Son, for the Qur'an a miracle comparable to the creation of Adam and no more, safeguarding the strict oneness of God. See <a href="/reference/figures/#mary">Mary</a> among the figures and <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/jesus-across-the-traditions/">Jesus across the traditions</a>, <a href="/journal/john-the-baptist-in-four-traditions/">John the Baptist in four traditions</a> and <a href="/journal/understanding-the-bible-and-the-quran-in-historical-context/">Understanding the Bible and the Qur’an in historical context</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="basilica-annunciation" alt="Inside the dome of the Basilica of the Annunciation in Nazareth, built over the traditional site of the Annunciation" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
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
<li id="note-6">Qur'an 19:16-26. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:the-preservation-and-transmission-of-scripture', 'photo' => array( 'name' => 'isaiah-scroll', 'alt' => 'Hebrew columns of the Great Isaiah Scroll from Qumran, copied in the second century BCE' ), 'type' => 'post', 'slug' => 'the-preservation-and-transmission-of-scripture', 'title' => 'The preservation and transmission of scripture',
			'excerpt' => 'How the Hebrew Bible, the New Testament and the Qur\'an were each copied, checked and handed down across centuries.', 'description' => 'Manuscripts, oral transmission and textual criticism: how three scriptures were preserved. Compare the evidence.', 'categories' => array( 'scripture' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>How a scripture reaches the present matters as much as what it says. Judaism, Christianity and Islam each developed a distinct answer to the problem of transmission across centuries and, in the case of the Qur'an, across a period when writing itself was far from universal.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="qumran-caves" alt="The caves near Qumran on the Dead Sea, where the scrolls were found" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-hebrew-bible"} -->
<h2 class="wp-block-heading" id="the-hebrew-bible">The Hebrew Bible</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Dead Sea Scrolls, found near Qumran from 1947 onwards, include copies of nearly every book of the Hebrew Bible from the third century BCE to the first century CE. Compared with the medieval Masoretic Text codified centuries later, they show substantial agreement in most books alongside real variation in others, evidence of a text that stabilised gradually rather than all at once.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
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
<p>Islamic tradition holds that the Qur'an was both memorised and written down during Muhammad's lifetime, and that the caliph ʿUthmān, within about twenty years of his death, had a single standard written text prepared and copies sent to the garrison cities, with other versions destroyed.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Two manuscripts discussed elsewhere on this site bear on the claim. The Birmingham leaves, radiocarbon-dated to within the range of Muhammad's own lifetime, match the standard text closely.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> The Sana'a palimpsest is more complicated: its later, upper layer also matches the standard text, but an earlier, erased lower layer, recovered by ultraviolet imaging, differs from it in wording and in the order of its chapters, and its script predates the reforms that later fixed the reading of the Arabic consonants.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Specialists read the lower text as a variant version in circulation before ʿUthmān's standardisation rather than as evidence against the tradition's account of a subsequent, deliberate unification of the text.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"oral-transmission"} -->
<h2 class="wp-block-heading" id="oral-transmission">Oral transmission</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Alongside the manuscripts, Islamic scholarship places heavy weight on the chain of memorisation: reciters (<em>ḥuffāẓ</em>) who learned the whole text by heart from a teacher who had done the same, a chain (<em>isnād</em>) tradition also central to the transmission of hadith. A text is called <em>mutawātir</em>, or continuously attested, when so many independent chains converge on the same reading that collusion in error is considered practically impossible.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> Judaism developed a comparable safeguard for its own scripture in the Masoretes' meticulous counting of letters and words to guard against a copyist's slip.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-comparison-shows"} -->
<h2 class="wp-block-heading" id="what-the-comparison-shows">What the comparison shows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Each tradition met the problem of transmission with the tools available to it: Judaism through Masoretic precision, Christianity through the sheer number of surviving copies subjected to critical comparison, and Islam through a written text stabilised early and reinforced by memorisation. None of the three claims an autograph, the author's own original copy, has survived; each instead offers a documented case for how confidently its later text can be traced back toward its origin. See <a href="/journal/understanding-the-bible-and-the-quran-in-historical-context/">Understanding the Bible and the Qur'an in historical context</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/understanding-the-bible-and-the-quran-in-historical-context/">Understanding the Bible and the Qur’an in historical context</a>, <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a> and <a href="/journal/the-cairo-genizah/">The Cairo Genizah</a>.</p>
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
			'key' => 'post:al-ghazali-ibn-rushd-and-the-limits-of-reason', 'photo' => array( 'name' => 'aristotle-arabic', 'alt' => 'A page from a medieval Arabic manuscript of Aristotle\'s logical works' ), 'type' => 'post', 'slug' => 'al-ghazali-ibn-rushd-and-the-limits-of-reason', 'title' => 'Al-Ghazali, Ibn Rushd and the limits of reason',
			'excerpt' => 'The medieval argument over whether philosophy could be trusted, and why it mattered more in Europe than in Islam.', 'description' => 'Al-Ghazali\'s attack on the philosophers and Ibn Rushd\'s reply, and why the debate shaped Europe more than Islam.', 'categories' => array( 'philosophy' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Faith and reason in medieval thought touches al-Ghazali and Ibn Rushd in passing; their dispute deserves its own telling, since it set the terms for how Islamic and, later, Christian scholasticism would argue about the proper limits of philosophy.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="averroes-statue" alt="A memorial statue of Ibn Rushd (Averroes) in Córdoba" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"al-ghazali-against-the-philosophers"} -->
<h2 class="wp-block-heading" id="al-ghazali-against-the-philosophers">Al-Ghazali against the philosophers</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Abū Ḥāmid al-Ghazālī (d. 1111), a jurist and theologian trained in the Ashʿarī school, wrote The Incoherence of the Philosophers to show that the Aristotelian metaphysics of Ibn Sīnā (Avicenna) and al-Fārābī could not deliver the certainty its practitioners claimed.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> He first set out their positions fairly, in a companion work, before attacking them on twenty points, three of which he judged to amount to unbelief: the philosophers' denial of bodily resurrection, their claim that God knows only universals and not particulars, and their doctrine of the world's eternity.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> His argument rested on occasionalism, the view that no created cause necessarily produces its effect; fire does not burn cotton by its own nature, but only because God customarily wills it so, and God could will otherwise.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"ibn-rushds-reply"} -->
<h2 class="wp-block-heading" id="ibn-rushds-reply">Ibn Rushd's reply</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ibn Rushd (Averroes, d. 1198), a judge and physician of Córdoba and the most influential commentator on Aristotle in either the Islamic or the Latin world, replied decades later with The Incoherence of the Incoherence, defending the philosophers point by point and arguing that al-Ghazālī had misunderstood or misrepresented their positions.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> In a separate work, The Decisive Treatise, he argued that philosophy and revealed law could not truly conflict, since both were paths to the same truth, and that apparent conflicts called for allegorical interpretation of scripture rather than the abandonment of demonstrative reasoning.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"who-prevailed-where"} -->
<h2 class="wp-block-heading" id="who-prevailed-where">Who prevailed where</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In the Islamic world al-Ghazālī's side of the argument proved the more lasting: Ashʿarī theology and Sufi devotion remained dominant, and the school of philosophy Ibn Rushd defended found few successors after him among Muslim scholars.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> His influence travelled instead to Latin Europe, where his commentaries on Aristotle, translated into Latin, earned him the title "the Commentator" and shaped scholastic philosophy for centuries, Thomas Aquinas among those who engaged closely with his work.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> See <a href="/journal/faith-and-reason-in-medieval-thought/">Faith and reason in medieval Jewish, Christian and Muslim thought</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/faith-and-reason-in-medieval-thought/">Faith and reason in medieval Jewish, Christian and Muslim thought</a> and <a href="/journal/how-the-abrahamic-religions-understand-monotheism/">How the Abrahamic religions understand monotheism</a>.</p>
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
			'key' => 'post:the-amman-message-and-a-common-word', 'photo' => array( 'name' => 'amman-mosque', 'alt' => 'The King Hussein Mosque in Amman, Jordan' ), 'type' => 'post', 'slug' => 'the-amman-message-and-a-common-word', 'title' => 'The Amman Message and A Common Word',
			'excerpt' => 'Two landmark declarations: a modern Muslim consensus on who is a Muslim, and an open letter to Christian leaders.', 'description' => 'The Amman Message and A Common Word Between Us and You: two major declarations. Read what each one says.', 'categories' => array( 'interfaith-studies' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Interfaith dialogue in the modern era surveys the field broadly; two documents from the past two decades deserve closer attention, since together they represent the largest formal consensus statements the Muslim scholarly world has produced on, respectively, its own internal unity and its relationship with Christianity.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="al-azhar" alt="The courtyard of al-Azhar Mosque in Cairo, whose Grand Shaykh was among the Amman Message’s signatories" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-amman-message"} -->
<h2 class="wp-block-heading" id="the-amman-message">The Amman Message</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In November 2004, King Abdullah II of Jordan issued a statement seeking to define what Islam is and is not. In July 2005 an international gathering of two hundred Muslim scholars from fifty countries, meeting in Amman, ratified three points: a definition of a Muslim recognising the validity of the recognised schools of Islamic law and theology, a prohibition on declaring any adherent of those schools an apostate, and conditions restricting who may issue a binding legal opinion.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Over the following year the three points were adopted by the Organisation of the Islamic Conference and by the International Islamic Fiqh Academy of Jeddah, and more than five hundred scholars worldwide, including the Shaykh al-Azhar, endorsed the document.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> It is a statement of internal Muslim consensus rather than an interfaith one, but its scale is itself a form of authority: agreement of this breadth across the Muslim world’s major schools is without precedent in modern Islamic history.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
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
<p>Neither document erases real theological disagreement; A Common Word deliberately narrows its claim to two shared commandments rather than a wider doctrinal agreement, and the Amman Message addresses Muslims about Muslims. Their significance lies in scale and in source: statements of this kind, signed by ruling religious authorities across the Muslim world's major branches, carry a weight that individual commentary cannot. See <a href="/journal/interfaith-dialogue-in-the-modern-era/">Interfaith dialogue in the modern era</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/interfaith-dialogue-in-the-modern-era/">Interfaith dialogue in the modern era</a> and <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a>, <a href="/journal/apostasy-in-the-abrahamic-traditions/">Apostasy in the Abrahamic traditions</a>.</p>
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
<li id="note-5">A Common Word Between Us and You, citing Qur'an 3:64 and the double commandment of Mark 12:29-31. <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Rowan Williams, foreword to A Common Word Between Us and You, 2010 edition; Pope Benedict XVI, address at the King Hussein Mosque, Amman, 9 May 2009. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:the-cairo-genizah', 'photo' => array( 'name' => 'genizah', 'alt' => 'The interior of the Ben Ezra Synagogue in Cairo, Egypt' ), 'type' => 'post', 'slug' => 'the-cairo-genizah', 'title' => 'The Cairo Genizah',
			'excerpt' => 'A synagogue storeroom in Cairo yielded 400,000 medieval fragments and reshaped the study of Jewish history.', 'description' => 'The Cairo Genizah: Solomon Schechter\'s 1896 discovery and what its 400,000 fragments reveal. Read the story.', 'categories' => array( 'archaeology' ), 'days_ago' => 0, 'since' => 38, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The Cairo Genizah is not a single discovery so much as a discipline's refounding: a single storeroom that transformed how scholars study medieval Jewish life, and, along the way, produced one more piece of physical evidence for how a scripture is preserved.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="cambridge-library" alt="Cambridge University Library, home to the Taylor-Schechter Genizah Collection" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-a-genizah-is"} -->
<h2 class="wp-block-heading" id="what-a-genizah-is">What a genizah is</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A <em>genizah</em> (<span lang="he" dir="rtl">גניזה</span>, hiding place) is a storeroom where worn or damaged texts bearing the name of God are set aside rather than destroyed, since Jewish law forbids their disposal. The Ben Ezra Synagogue in Fustat, Old Cairo, kept one for close to a thousand years, from the sixth century CE into the nineteenth.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
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
<p>Most of the material is mundane: letters, contracts, court records and shopping lists, written in Hebrew script across Hebrew, Judaeo-Arabic and Aramaic. It is precisely this ordinariness that makes the collection valuable, since it documents everyday medieval Jewish, and often Muslim and Christian, life in a way literary sources never do.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Among the fragments are also biblical manuscripts and a Hebrew text of Ben Sira (Ecclesiasticus), previously known only in Greek translation, whose identification by Schechter first alerted him to the Genizah's significance.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"why-it-matters-here"} -->
<h2 class="wp-block-heading" id="why-it-matters-here">Why it matters here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Genizah's biblical fragments sit alongside the Dead Sea Scrolls and the Aleppo and Leningrad Codices as part of the manuscript evidence for how the Hebrew Bible reached its present form, discussed further on the preservation and transmission article. Its far larger documentary record also preserves direct evidence of Jewish life under early Muslim rule in Egypt, the everyday counterpart to the more formal recognitions discussed on the Timeline. See <a href="/journal/the-preservation-and-transmission-of-scripture/">The preservation and transmission of scripture</a> and <a href="/reference/sacred-texts/tanakh/">The Tanakh</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"abr-further"} -->
<p class="abr-further">Further reading: <a href="/journal/the-preservation-and-transmission-of-scripture/">The preservation and transmission of scripture</a> and <a href="/journal/what-archaeology-tells-us-about-the-ancient-near-east/">What archaeology tells us about the ancient Near East</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="genizah-fragment" alt="A legal document from the Cairo Genizah, one of some 400,000 fragments recovered from the storeroom" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
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
			'key' => 'post:haman-in-the-quran', 'photo' => array( 'name' => 'luxor-obelisk', 'alt' => 'The obelisk and pylon of the Luxor Temple, part of the New Kingdom temple complex dedicated to Amun' ), 'type' => 'post', 'slug' => 'haman-in-the-quran', 'title' => 'Haman in the Qur’an',
			'excerpt' => 'Was the Qur\'an\'s Haman borrowed from the Bible\'s Esther, or is his name an Egyptian priestly title?', 'description' => 'Critics say Haman is borrowed from Esther. Read the case that his name is an Egyptian priestly title instead.', 'categories' => array( 'scripture', 'history' ), 'days_ago' => 0, 'since' => 43, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Among the figures the Qur’an places in Pharaoh’s court, none has drawn sharper criticism than Haman. Named six times, he is the official Pharaoh orders to build a tower reaching toward the heavens.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Western Orientalists have long pointed to a difficulty: a Haman appears in the Bible too, centuries later and in a different empire.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="karnak-hypostyle" alt="Columns of the Hypostyle Hall at the temple of Amun in Karnak, expanded during the reign of Ramesses II" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-objection"} -->
<h2 class="wp-block-heading" id="the-objection">The objection</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Bible’s Haman is a Persian official at the court of Ahasuerus (identified with Xerxes I), who plots the destruction of the Jews in the Book of Esther, set roughly a thousand years after Moses.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Since the Qur’an places a Haman at Pharaoh’s side instead, a line of scholars from the seventeenth century onward concluded that Muhammad had confused the two settings. Theodor Nöldeke put it bluntly in his 1891 Encyclopædia Britannica article: "The most ignorant Jew could never have mistaken Haman... for the minister of the Pharaoh."<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Similar verdicts came from Alphonse Mingana, Henri Lammens and Arthur Jeffery, and the point still appears in reference works: the second edition of the Encyclopaedia of Islam calls the placement of Haman at Pharaoh’s court "a still unexplained confusion."<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"is-the-biblical-source-itself-reliable"} -->
<h2 class="wp-block-heading" id="is-the-biblical-source-itself-reliable">Is the biblical source itself reliable?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The objection assumes the Book of Esther gives a historically dependable account of a real official named Haman. That assumption is not shared by the scholars who study Esther closely. Jon Levenson, of Harvard Divinity School, writes that "the historical problems with Esther are so massive as to persuade anyone... to doubt the veracity of the narrative."<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Michael Fox, a specialist in Hebrew and Egyptian literature at the University of Wisconsin, catalogues the book’s implausibilities and concludes it gives "the impression of a writer recalling a vaguely remembered past."<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Adele Berlin, an editor of the Jewish Study Bible, notes that a succession of twentieth-century commentators, writing between 1908 and 1997, each independently concluded the book is not historical.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> No source outside the Bible attests to a Haman, a Mordecai or a Jewish queen at the Persian court, and the wife of the historical Xerxes is known by a different name, Amestris.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Whatever the Qur’an’s Haman is, he cannot straightforwardly be measured against a firmly established biblical figure, because Esther’s own Haman is not one.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"haman-as-a-title-not-a-name"} -->
<h2 class="wp-block-heading" id="haman-as-a-title-not-a-name">Haman as a title, not a name</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A different line of scholarship, running from Sher Mohammad Syed in 1980 through Abdurrahman Badawi and Muhammad Asad, has proposed that Haman in the Qur’an is not a personal name at all but an Arabized form of an Egyptian title.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> The Qur’an’s own usage offers a precedent: it calls Joseph’s ruler "the king" but calls Moses’ ruler "Pharaoh," a title derived from the Egyptian per-aa, "the great house," which came to denote the king himself only in the New Kingdom.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup> The proposal is that Haman works the same way, echoing imn or amana, the Egyptian god Amun, whose name formed part of several priestly and administrative titles, from the ordinary wab-priest up to the ḥm-nṯr-tpy, the High Priest of Amun, and, in at least one inscription, an architect’s title as well.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup> On this reading, the Qur’an’s Haman held the office of High Priest of Amun, a position that combined religious authority with charge of major construction, rather than being a specific individual’s given name.</p>
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
<p>Not every proposed link has held up. An earlier attempt connected Haman to an inscription reading ḥmn-ḥ on a door jamb naming an overseer of stonemasons; on review by the Egyptologist Jürgen Osing of the Freie Universität Berlin, the final ḥ proved to be part of the name rather than a separate word, and the office, that of a local overseer, sat too low in rank to fit the Qur’an’s Haman.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> The identification was withdrawn once the correction was made, which is worth stating plainly: a proposal built on inscriptional evidence has to give way when the inscription is read more carefully.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"where-the-question-stands"} -->
<h2 class="wp-block-heading" id="where-the-question-stands">Where the question stands</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The title theory is a minority position. Most specialists in Qur’anic studies, including Adam Silverstein in the most detailed modern treatment of the question, continue to hold that the Qur’an’s Haman descends literarily from the Book of Esther, by way of later commentary and legend rather than the Qur’anic text read alone.<sup class="abr-fn"><a href="#note-15" id="ref-15">15</a></sup> What the argument set out above establishes is narrower: the case against the Qur’an cannot rest on treating Esther’s Haman as settled history, since mainstream biblical scholarship does not treat him that way, and an Egyptian derivation of the name remains a live, evidenced alternative, tied to a specific office and a specific candidate, rather than a claim asserted without support. See <a href="/journal/the-king-and-the-pharaoh/">The king and the Pharaoh</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="persepolis" alt="Ruins at Persepolis, a ceremonial capital of the Achaemenid Persian empire in which the Book of Esther is set" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Qur'an 28:6, 8, 38; 29:39; 40:24, 36-37. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:the-population-of-the-abrahamic-religions', 'photo' => array( 'name' => 'lagos-skyline', 'alt' => 'Lagos, Nigeria, one of the fast-growing cities of sub-Saharan Africa' ), 'type' => 'post', 'slug' => 'the-population-of-the-abrahamic-religions', 'title' => 'The population of the Abrahamic religions',
			'excerpt' => 'Pew Research projects Islam and Christianity nearing parity by 2050, and Islam becoming the largest religion by 2060 or later.', 'description' => 'Pew\'s demographic projections for Judaism, Christianity and Islam to 2050 and 2060. Read what drives the numbers.', 'categories' => array( 'religion', 'history' ), 'days_ago' => 0, 'since' => 45, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>How many people belong to each Abrahamic tradition, and how is that changing? The most detailed answer comes from the Pew Research Center, which in 2015 published the first large-scale demographic projections of the world’s religions, built from more than 2,500 censuses, surveys and population registers rather than estimation alone.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="population-density-map" alt="A world population density map, 2020" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-present-picture"} -->
<h2 class="wp-block-heading" id="the-present-picture">The present picture</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>As of Pew’s baseline year, Christians were the largest religious group in the world, with Muslims second.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> Jews were, and remain, by far the smallest group for which Pew produced a separate projection, numbering a little under 14 million worldwide, some 0.2 per cent of the global population.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> Mandaeism, with a global community numbered in the tens of thousands, falls beneath the threshold at which census and survey data allow a demographer to project it separately at all; it appears in no study of this kind, Pew’s included.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-drives-the-difference"} -->
<h2 class="wp-block-heading" id="what-drives-the-difference">What drives the difference</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Pew traces future change mainly to fertility and age, not conversion. Globally, Muslim women have the highest fertility of any major religious group, an average of 3.1 children, against 2.7 for Christians and 2.3 for Jews, all above the replacement level of 2.1.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Muslims also have the youngest median age of any group Pew measured, seven years below the median for non-Muslims, which means a larger share of Muslims are approaching the years in which people have children.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup> Both patterns concentrate in sub-Saharan Africa and parts of Asia, where Muslim and Christian populations are both growing quickly, while the regions where the religiously unaffiliated are concentrated, Europe, North America, China and Japan, have low fertility and ageing populations.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"the-projection-to-2050-and-2060"} -->
<h2 class="wp-block-heading" id="the-projection-to-2050-and-2060">The projection to 2050 and 2060</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>On these trends, Pew’s central projection has Christians and Muslims reaching near parity by 2050, at 2.9 billion (31 per cent of the world’s population) and 2.8 billion (30 per cent) respectively, the first time in history the two would stand so close.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup> A later Pew analysis, extending the same model to 2060, projects that Muslims would overtake Christians as the world’s largest religious group in the second half of the century, growing 70 per cent between 2015 and 2060 against 32 per cent for the world’s population as a whole.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> The Jewish population is projected to keep growing in absolute terms, to about 16.1 million by 2050, while continuing to decline slightly as a share of the world’s much faster-growing population.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"where-christians-will-live"} -->
<h2 class="wp-block-heading" id="where-christians-will-live">Where Christians will live</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The same projections show Christianity shifting its centre of gravity. In 2010 the world’s Christians were spread almost evenly across Europe (26 per cent), Latin America and the Caribbean (25 per cent) and sub-Saharan Africa (24 per cent), while fewer than 1 per cent lived in the Middle East and North Africa, the region where the faith began. By 2050 Pew projects that 38 per cent of the world’s Christians will live in sub-Saharan Africa and only about 16 per cent in Europe, the one region where the number of Christians is expected to fall in absolute terms, from 553 million to 454 million.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup> Nigeria is projected to hold the world’s third-largest Christian population by mid-century, although Christians would then make up only 39 per cent of its people.<sup class="abr-fn"><a href="#note-11" id="ref-11">11</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Conversion plays a modest part worldwide and a larger one in the West. Pew projects net losses to Christianity through religious switching in North America, Europe and Latin America, most of it toward no religious affiliation: without switching, Christians would make up about 75 per cent of North America’s population in 2050, against 66 per cent once switching is counted. In sub-Saharan Africa, where the number of Christians is expected to more than double, their share of the population is still projected to slip from 63 to 59 per cent, because the region’s Muslim population is growing faster still.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[abr_photo name="jakarta-istiqlal" alt="The Istiqlal Mosque in Jakarta, Indonesia, seen across the skyline of the country with the world’s largest Muslim population" ratio="16 / 9"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"a-historical-footnote"} -->
<h2 class="wp-block-heading" id="a-historical-footnote">A historical footnote</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Pew’s researchers also asked historians when Christians and Muslims were last so close in number. Most hold that Christians have always outnumbered Muslims worldwide since Islam’s rise in the seventh century, given Christianity’s six-century head start. A minority view, associated with the Oxford demographer David Coleman and the Columbia historian Richard Bulliet, holds that Muslims may briefly have outnumbered Christians sometime between 1000 and 1600 CE, as Muslim populations expanded while plague, above all the Black Death, cut deeply into Europe’s Christian population. Pew is careful to note that estimates for this period carry wide uncertainty.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-a-projection-is-not"} -->
<h2 class="wp-block-heading" id="what-a-projection-is-not">What a projection is not</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>None of this is a prophecy. Pew’s own report says plainly that the projections describe what would follow if current fertility, mortality, migration and conversion patterns continue, and that events ranging from conflict to economic change can move demographic trends in ways no model can foresee; this is why the projections cover a bounded forty- to forty-five-year window rather than reaching further into the century.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> Read that way, the figures describe a trajectory worth understanding on its own terms, not a settled outcome. See <a href="/religions/islam/">Islam</a> and <a href="/religions/christianity/">Christianity</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Conrad Hackett et al., "The Future of World Religions: Population Growth Projections, 2010-2050" (Washington, DC: Pew Research Center, 2 April 2015). <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-2">Hackett et al., "The Future of World Religions," Overview. <a href="#ref-2" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-3">Ibid., ch. 2, "Jews." <a href="#ref-3" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-4">Ibid., ch. 1, "Fertility." <a href="#ref-4" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-5">Michael Lipka and Conrad Hackett, "Why Muslims Are the World’s Fastest-Growing Religious Group," Pew Research Center, 6 April 2017 (an update of an article first published 23 April 2015). <a href="#ref-5" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-6">Hackett et al., "The Future of World Religions," Overview. <a href="#ref-6" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-7">Ibid., Overview and ch. 2, "Christians" and "Muslims." <a href="#ref-7" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-8">Lipka and Hackett, "Why Muslims Are the World’s Fastest-Growing Religious Group." <a href="#ref-8" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-9">Hackett et al., "The Future of World Religions," ch. 2, "Jews." <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-10">Hackett et al., "The Future of World Religions," ch. 2, "Christians," "Regional Change." <a href="#ref-10" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-11">Ibid., "Change in Countries With Largest Christian Populations." <a href="#ref-11" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-12">Ibid., "Regional Change" and "Demographic Characteristics of Christians That Will Shape Their Future." <a href="#ref-12" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-13">Ibid., Overview, note 2, citing Todd M. Johnson, Houssain Kettani, David Coleman and Richard W. Bulliet. <a href="#ref-13" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li id="note-14">Ibid., Overview, "Why Do Some Religious Groups Grow Faster Than Others?" <a href="#ref-14" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->
ABR_SEED,
		),
		array(
			'key' => 'post:paul-and-peter-two-missions', 'photo' => array( 'name' => 'antioch', 'alt' => 'The modern city of Antakya, Turkey, on the site of ancient Antioch, where Paul confronted Peter' ), 'type' => 'post', 'slug' => 'paul-and-peter-two-missions', 'title' => 'Paul and Peter: two missions in the early church',
			'excerpt' => 'Paul\'s own letters describe a real conflict with Peter at Antioch. A later letter, in Peter\'s name, makes peace.', 'description' => 'Paul rebuked Peter to his face at Antioch. See how a later New Testament letter quietly made peace between them.', 'categories' => array( 'history', 'scripture' ), 'days_ago' => 0, 'since' => 46, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>The New Testament is often read as the record of a single, unified church. Its own earliest documents, Paul’s own letters, tell a rougher story: a real and public dispute between Paul and Peter over what a Gentile had to do to belong to the church of a Jewish messiah.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<!-- wp:heading {"anchor":"the-confrontation-at-antioch"} -->
<h2 class="wp-block-heading" id="the-confrontation-at-antioch">The confrontation at Antioch</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Paul’s own account, in his letter to the Galatians, is the earliest first-hand record of any dispute in the church’s history. At Antioch, where Paul had preached for years, Jewish and Gentile Christians had been eating together without regard to Jewish dietary law. When representatives from the Jerusalem church, associated with James, the brother of Jesus, arrived, Peter stopped eating with the Gentile believers. Paul says he "opposed him to his face, because he stood condemned," accusing Peter of hypocrisy: eating as a Gentile when it suited him, then compelling Gentiles to live as Jews once the Jerusalem party appeared.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Even Barnabas, Paul’s own missionary partner, sided with Peter.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> The split was not confined to Antioch: in Corinth, a church Paul had founded, some believers were still identifying themselves by faction years later, “I belong to Paul,” others, “I belong to Cephas,” Peter’s Aramaic name.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup></p>
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
<p>The Acts of the Apostles gives a second account of the underlying dispute, at what is usually called the Jerusalem council, and its tone is markedly more harmonious than Paul’s own letter. Goulder describes Acts’ version as inflated, turning what was probably a private meeting into something resembling a full council, though the letter Acts records afterward, asking Gentile converts to abstain from food sacrificed to idols, from blood and from sexual immorality, likely reflects the terms actually agreed.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> Paul’s letters, written by a participant close to the events, and Acts, written a generation or more later by an author working to present a unified church, do not read as independent confirmations of each other so much as two different angles on the same underlying conflict, one considerably more willing than the other to let the conflict show.</p>
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
<p>The United States Conference of Catholic Bishops’ own introduction to the letter states plainly that "among modern scholars there is wide agreement that 2 Peter is a pseudonymous work," written by someone other than the apostle "according to a literary convention popular at the time," and that many scholars regard it as the latest-written document in the New Testament, from the early or middle second century.<sup class="abr-fn"><a href="#note-8" id="ref-8">8</a></sup> Among the reasons given: the letter refers to the apostles as a prior generation, already dead; it responds to a settled collection of Paul’s letters, well known enough that disputes had already arisen over how to read them; and its account of false teachers borrows extensively from the Letter of Jude, in a direction scholars agree runs from Jude to 2 Peter and not the reverse.<sup class="abr-fn"><a href="#note-9" id="ref-9">9</a></sup> Even the early church was divided on the letter’s authenticity: Origen, in the early third century, is the earliest writer to mention it at all, and reports that others rejected it outright, a doubt that persisted in some churches into the fifth century.<sup class="abr-fn"><a href="#note-10" id="ref-10">10</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"what-the-pattern-shows"} -->
<h2 class="wp-block-heading" id="what-the-pattern-shows">What the pattern shows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Read together, the evidence describes a real progression rather than a single settled position. Paul’s own letters preserve an open, personal conflict with Peter over the terms of Gentile membership in the church. Acts, writing later, softens the same conflict into a council reaching friendly agreement. A letter written in Peter’s name, later still, goes a step further and places apostolic authority explicitly behind Paul, folding his letters into scripture and warning against misreading them. The dispute did not vanish because it was resolved on the day it happened; it receded because later generations of the church wrote it into a settled peace.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"abr-notes"} -->
<ol class="wp-block-list abr-notes"><!-- wp:list-item -->
<li id="note-1">Galatians 2:11-14. <a href="#ref-1" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
			'key' => 'post:apostasy-in-the-abrahamic-traditions', 'photo' => array( 'name' => 'vilna-talmud', 'alt' => 'A page of the Babylonian Talmud in the Vilna edition' ), 'type' => 'post', 'slug' => 'apostasy-in-the-abrahamic-traditions', 'title' => 'Apostasy in the Abrahamic traditions',
			'excerpt' => 'Rabbinic law, Christian empire, classical Islamic jurisprudence and modern reconsideration: how each tradition has treated those who leave.', 'description' => 'How Judaism, Christianity, Islam and Mandaeism have treated those who leave the faith. Read the comparison.', 'categories' => array( 'religion', 'history' ), 'days_ago' => 0, 'since' => 48, 'parent' => '',
			'content' => <<<'ABR_SEED'
<!-- wp:paragraph -->
<p>Every one of the Abrahamic traditions has had to decide what becomes of a member who leaves. The answers differ sharply, and each has changed over time: from the rabbinic insistence that a Jew remains a Jew, through the Christian empire’s civil penalties and the medieval Church’s death sentence for heresy, to the classical Islamic jurists’ capital ruling and the modern Muslim scholarship that has reopened it.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"judaism-once-an-israelite"} -->
<h2 class="wp-block-heading" id="judaism-once-an-israelite">Judaism: once an Israelite</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Hebrew Bible prescribes death for one who entices others to serve other gods.<sup class="abr-fn"><a href="#note-1" id="ref-1">1</a></sup> Rabbinic law, however, settled on a principle drawn from the story of Achan: an Israelite who has sinned remains an Israelite.<sup class="abr-fn"><a href="#note-2" id="ref-2">2</a></sup> In practice the principle meant that a Jew who adopted another religion kept the family obligations and rights of a Jew: his marriage stood, a divorce still required his writ, and he could still inherit.<sup class="abr-fn"><a href="#note-3" id="ref-3">3</a></sup> The standard modern reference work on Judaism states the consequence plainly: in Jewish religious law it is technically impossible for a Jew to change religion.<sup class="abr-fn"><a href="#note-4" id="ref-4">4</a></sup> Later authorities distinguished the provocative apostate from the one who left for convenience, and some medieval jurists took a harder line on the descendants of converts, but the governing principle has held.<sup class="abr-fn"><a href="#note-5" id="ref-5">5</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"christianity-from-civil-penalty-to-religious-freedom"} -->
<h2 class="wp-block-heading" id="christianity-from-civil-penalty-to-religious-freedom">Christianity: from civil penalty to religious freedom</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The first Christians suffered for their faith and could not punish anyone for leaving it. Once the Roman Empire became Christian, apostasy turned into a civil offence. A law of 381 CE, preserved in the code compiled under Theodosius II, stripped Christians who had become pagans of the right to make a will; a law of 391 CE barred those who had "betrayed the holy faith" from giving testimony and from inheriting.<sup class="abr-fn"><a href="#note-6" id="ref-6">6</a></sup> In the thirteenth century Thomas Aquinas argued that heretics, who corrupt the faith, deserve not only excommunication but death at the hands of the secular authority, a judgement that shaped the practice of the Inquisition.<sup class="abr-fn"><a href="#note-7" id="ref-7">7</a></sup></p>
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
<p>The classical jurists of all four Sunni schools nonetheless held that an adult male apostate who refused to repent after being invited to do so should be put to death, drawing on reports from the Prophet’s sayings and the wars against the tribes that broke away after his death.<sup class="abr-fn"><a href="#note-12" id="ref-12">12</a></sup> That ruling has been challenged from within the tradition itself. Taha Jabir al-Alwani, a graduate of al-Azhar and a member of the Islamic Fiqh Academy of the Organisation of Islamic Cooperation, argued in a detailed study that neither the Qur’an nor the Sunnah mandates death for a change of belief alone, that the Prophet never put anyone to death for apostasy, and that the early penalties concerned apostasy joined to rebellion or treason against the community.<sup class="abr-fn"><a href="#note-13" id="ref-13">13</a></sup> On this reading, leaving Islam is a grave sin answered in the next world, and the state’s concern begins only where the act becomes a crime against public order.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"mandaeism-a-closed-community"} -->
<h2 class="wp-block-heading" id="mandaeism-a-closed-community">Mandaeism: a closed community</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Mandaeism does not seek converts, and belonging is a matter of birth and observance within the community. Marriage is arranged within Mandaean families, and a bride must come of a suitable Mandaean family with no taint of alien blood.<sup class="abr-fn"><a href="#note-14" id="ref-14">14</a></sup> For so small a community the practical question has been loss through marriage outside it and through emigration, not the punishment of those who leave.</p>
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
<p class="abr-further">Further reading: <a href="/journal/the-sabians-of-the-quran/">The Sabians of the Qur’an</a> and <a href="/journal/the-amman-message-and-a-common-word/">The Amman Message and A Common Word</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"notes","className":"abr-notes-title"} -->
<h2 class="wp-block-heading abr-notes-title" id="notes">Notes</h2>
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
<li id="note-9">Qur'an 2:217. <a href="#ref-9" class="abr-fn-back" aria-label="Back to the text">&#8617;</a></li>
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
	),
);
