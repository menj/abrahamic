<?php
/**
 * Journal tags: a fixed vocabulary of lowercase, search-led tags, each used on
 * at least three articles, with a description (under 130 characters, with a
 * call to action) and a Rank Math focus keyword for its tag page.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

return array(
	'terms' => array(
		// Traditions.
		'judaism'              => array( 'judaism', 'Articles on Judaism: its scripture, law, history and its relations with Christianity and Islam. Browse the articles.', 'judaism' ),
		'mandaeism'            => array( 'mandaeism', 'Articles on Mandaeism, the baptismal faith of Iraq and Iran, and its place among the Abrahamic religions. Browse them here.', 'mandaeism' ),
		'christianity'         => array( 'christianity', 'Articles on Christianity: its origins, councils, scriptures and its relations with Judaism and Islam. Browse the articles.', 'christianity' ),
		'islam'                => array( 'islam', 'Articles on Islam: the Qur\'an, the Prophet, worship and law, and Islam\'s view of the earlier faiths. Browse the articles.', 'islam' ),
		// Figures.
		'abraham'              => array( 'abraham', 'Articles on Abraham, father of the faithful: his origins, his language, his sons and his legacy. Read them here.', 'abraham' ),
		'ishmael'              => array( 'ishmael', 'Articles on Ishmael, Abraham\'s firstborn: in Genesis, in the Qur\'an, at Makkah and in prophecy. Read them here.', 'ishmael' ),
		'moses'                => array( 'moses', 'Articles on Moses in the Bible and the Qur\'an: Pharaoh, Haman, the law and the prophet like him. Read them here.', 'moses in the quran' ),
		'david'                => array( 'david', 'Articles on David, prophet and king: Saul, Goliath, Jerusalem and the line of the Messiah. Read them here.', 'prophet david' ),
		'jesus'                => array( 'jesus', 'Articles on Jesus in the four traditions: the Messiah, his birth, his mission and his return. Read them here.', 'jesus in islam' ),
		'mary'                 => array( 'mary', 'Articles on Mary, mother of Jesus, honoured in the New Testament and the Qur\'an alike. Read them here.', 'mary in islam' ),
		'john-the-baptist'     => array( 'john the baptist', 'Articles on John the Baptist, prophet of Christianity, Islam and Mandaeism. Read them here.', 'john the baptist in islam' ),
		'prophet-muhammad'     => array( 'prophet muhammad', 'Articles on the Prophet Muhammad: revelation, the first mosque, and his foretelling in earlier scripture. Read them here.', 'prophet muhammad' ),
		// Places.
		'jerusalem'            => array( 'jerusalem', 'Articles on Jerusalem, holy city of three faiths, and the history made in and around it. Read them here.', 'jerusalem' ),
		'makkah'               => array( 'makkah', 'Articles on Makkah: the Kaaba, the Hajj and the beginnings of revelation. Read them here.', 'makkah' ),
		'constantinople'       => array( 'constantinople', 'Articles on Constantinople and Istanbul: Hagia Sophia, the great sees and the councils. Read them here.', 'constantinople' ),
		'harran'               => array( 'harran', 'Articles on Harran: Abraham\'s city, the Sabians and the scholars of the ancient north. Read them here.', 'harran' ),
		'babylon'              => array( 'babylon', 'Articles on Babylon and Mesopotamia: Ur, Hārūt and Mārūt, and the ancient Near East. Read them here.', 'babylon' ),
		'egypt'                => array( 'egypt', 'Articles on Egypt in scripture and history: Joseph, Moses, Pharaoh and the Cairo Genizah. Read them here.', 'egypt in the bible' ),
		// Themes.
		'quran'                => array( 'quran', 'Articles on the Qur\'an: its message, its verses on earlier scripture, and its preservation. Read them here.', 'quran' ),
		'bible'                => array( 'bible', 'Articles on the Bible: its books, its history, and how the Qur\'an and Muslims read it. Read them here.', 'bible' ),
		'torah'                => array( 'torah', 'Articles on the Torah: its law, its preservation and its place in the Qur\'an. Read them here.', 'torah' ),
		'monotheism'           => array( 'monotheism', 'Articles on monotheism: the one God of Abraham, tawhid, the Trinity and the creeds. Read them here.', 'monotheism' ),
		'prophecy'             => array( 'prophecy', 'Articles on prophecy: the Messiah, the prophet like Moses and the foretelling of Muhammad. Read them here.', 'prophecy in the bible' ),
		'religious-law'        => array( 'religious law', 'Articles on religious law: halakhah, canon law and the sharia, food, marriage and apostasy. Read them here.', 'religious law' ),
		'prayer-and-worship'   => array( 'prayer and worship', 'Articles on prayer and worship: daily prayer, baptism, the Hajj and the Kaaba. Read them here.', 'prayer and worship' ),
		'early-church'         => array( 'early church', 'Articles on the early church: Paul and Peter, the parting from Judaism, Nicaea and the creeds. Read them here.', 'early church history' ),
		'end-times'            => array( 'end times', 'Articles on the end times: the return of Jesus, Gog and Magog, the Antichrist and the Dajjal. Read them here.', 'end times' ),
	),
	// Tags withdrawn because they duplicated a category ("interfaith relations"
	// repeated the Interfaith studies category). Deleted only if still exactly
	// as the theme created them; their articles move to the category instead.
	'retired' => array(
		'interfaith-relations' => 'Articles on relations between the faiths: dialogue, war and peace, marriage and shared history. Read them here.',
	),
	'categories' => array(
		'post:the-cairo-genizah'                         => array( 'interfaith-studies' ),
		'post:war-and-peace-in-the-abrahamic-traditions' => array( 'interfaith-studies' ),
		'post:interfaith-marriage'                       => array( 'interfaith-studies' ),
		'post:jews-under-muslim-rule'                    => array( 'interfaith-studies' ),
	),
	'posts' => array(
		'post:galilee' => array( 'jesus', 'christianity', 'quran', 'bible' ),
		'post:safed-and-tiberias' => array( 'judaism', 'torah', 'quran', 'bible' ),
		'post:shiloh-and-masada' => array( 'judaism', 'bible', 'quran', 'moses' ),
		'post:patmos-and-mount-athos' => array( 'christianity', 'bible', 'quran', 'prayer-and-worship' ),
		'post:christian-pilgrimage' => array( 'christianity', 'mary', 'quran', 'prayer-and-worship' ),
		'post:masjid-al-aqsa' => array( 'jerusalem', 'prophet-muhammad', 'quran', 'islam' ),
		'post:badr-and-uhud' => array( 'prophet-muhammad', 'quran', 'islam', 'makkah' ),
		'post:kairouan' => array( 'islam', 'quran', 'religious-law', 'prayer-and-worship' ),
		'post:tigris-and-euphrates' => array( 'mandaeism', 'babylon', 'bible', 'prayer-and-worship' ),
		'post:who-was-abraham'                                      => array( 'abraham', 'harran', 'judaism', 'christianity', 'islam' ),
		'post:how-the-abrahamic-religions-understand-monotheism'    => array( 'monotheism', 'judaism', 'christianity', 'islam', 'mandaeism' ),
		'post:understanding-the-bible-and-the-quran-in-historical-context' => array( 'bible', 'quran', 'torah', 'christianity', 'islam' ),
		'post:jerusalem-in-three-traditions'                        => array( 'jerusalem', 'david', 'judaism', 'christianity', 'islam' ),
		'post:prayer-across-the-abrahamic-traditions'               => array( 'prayer-and-worship', 'judaism', 'christianity', 'islam', 'mandaeism' ),
		'post:what-archaeology-tells-us-about-the-ancient-near-east' => array( 'egypt', 'babylon', 'bible', 'torah' ),
		'post:faith-and-reason-in-medieval-thought'                 => array( 'judaism', 'christianity', 'islam' ),
		'post:interfaith-dialogue-in-the-modern-era'                => array( 'judaism', 'christianity', 'islam' ),
		'post:millat-ibrahim'                                       => array( 'abraham', 'monotheism', 'quran', 'makkah', 'islam' ),
		'post:who-was-kedar'                                        => array( 'ishmael', 'prophecy', 'prophet-muhammad', 'bible', 'islam' ),
		'post:john-the-baptist-in-four-traditions'                  => array( 'john-the-baptist', 'jesus', 'mandaeism', 'christianity', 'islam' ),
		'post:masbuta-baptism-in-running-water'                     => array( 'mandaeism', 'prayer-and-worship', 'john-the-baptist' ),
		'post:the-sabians-of-the-quran'                             => array( 'mandaeism', 'harran', 'quran' ),
		'post:the-king-and-the-pharaoh'                             => array( 'egypt', 'moses', 'quran', 'bible', 'torah' ),
		'post:jesus-across-the-traditions'                          => array( 'jesus', 'mary', 'john-the-baptist', 'end-times', 'christianity', 'islam', 'judaism' ),
		'post:mary-across-the-traditions'                           => array( 'mary', 'jesus', 'quran', 'christianity', 'islam' ),
		'post:the-preservation-and-transmission-of-scripture'       => array( 'quran', 'bible', 'torah' ),
		'post:al-ghazali-ibn-rushd-and-the-limits-of-reason'        => array( 'islam', 'christianity', 'judaism' ),
		'post:the-amman-message-and-a-common-word'                  => array( 'islam', 'christianity' ),
		'post:the-cairo-genizah'                                    => array( 'egypt', 'judaism', 'islam' ),
		'post:haman-in-the-quran'                                   => array( 'egypt', 'moses', 'quran', 'bible' ),
		'post:the-population-of-the-abrahamic-religions'            => array( 'judaism', 'mandaeism', 'christianity', 'islam' ),
		'post:paul-and-peter-two-missions'                          => array( 'early-church', 'jerusalem', 'jesus', 'christianity' ),
		'post:apostasy-in-the-abrahamic-traditions'                 => array( 'religious-law', 'judaism', 'christianity', 'islam' ),
		'post:the-sabians-in-classical-muslim-scholarship'          => array( 'harran', 'mandaeism', 'islam' ),
		'post:abrahamic-family-tree'                                => array( 'abraham', 'ishmael', 'judaism', 'mandaeism', 'christianity', 'islam' ),
		'post:the-council-of-nicaea'                                => array( 'early-church', 'monotheism', 'jesus', 'constantinople', 'quran', 'christianity' ),
		'post:the-five-great-sees'                                  => array( 'early-church', 'constantinople', 'jerusalem', 'christianity' ),
		'post:hagia-sophia'                                         => array( 'constantinople', 'quran', 'christianity', 'islam' ),
		'post:the-stations-of-the-hajj'                             => array( 'makkah', 'prayer-and-worship', 'abraham', 'ishmael', 'islam' ),
		'post:hira-and-quba'                                        => array( 'makkah', 'prophet-muhammad', 'quran', 'islam' ),
		'post:what-language-did-abraham-speak'                      => array( 'abraham', 'ishmael', 'harran', 'bible', 'quran' ),
		'post:the-parting-of-the-ways'                              => array( 'early-church', 'jerusalem', 'jesus', 'judaism', 'christianity' ),
		'post:where-was-abraham-from'                               => array( 'abraham', 'harran', 'babylon', 'quran' ),
		'post:the-symbols-of-the-four-traditions'                   => array( 'judaism', 'mandaeism', 'christianity', 'islam' ),
		'post:religious-law-in-the-abrahamic-traditions'            => array( 'religious-law', 'torah', 'judaism', 'christianity', 'islam' ),
		'post:food-and-faith'                                       => array( 'religious-law', 'judaism', 'mandaeism', 'christianity', 'islam' ),
		'post:war-and-peace-in-the-abrahamic-traditions'            => array( 'quran', 'judaism', 'christianity', 'islam' ),
		'post:the-islamic-dilemma'                                  => array( 'bible', 'quran', 'christianity', 'islam' ),
		'post:islamic-dilemma-reddit'                               => array( 'bible', 'quran', 'christianity', 'islam' ),
		'post:judaism-vs-christianity-reddit'                       => array( 'jesus', 'torah', 'judaism', 'christianity' ),
		'post:the-messiah-in-three-traditions'                      => array( 'jesus', 'mary', 'david', 'prophecy', 'end-times', 'judaism', 'christianity', 'islam' ),
		'post:ishmael-in-the-abrahamic-traditions'                  => array( 'ishmael', 'abraham', 'makkah', 'bible', 'islam' ),
		'post:is-allah-the-god-of-the-bible'                        => array( 'monotheism', 'bible', 'quran', 'christianity', 'islam' ),
		'post:the-gospel-of-barnabas'                               => array( 'jesus', 'bible', 'christianity', 'islam' ),
		'post:what-the-quran-says-about-the-bible'                  => array( 'bible', 'torah', 'quran', 'islam' ),
		'post:the-kaaba'                                            => array( 'makkah', 'abraham', 'ishmael', 'prayer-and-worship', 'islam' ),
		'post:saul-in-the-quran'                                    => array( 'david', 'quran', 'bible', 'judaism' ),
		'post:interfaith-marriage'                                  => array( 'religious-law', 'judaism', 'christianity', 'islam' ),
		'post:gog-and-magog-and-the-dajjal'                         => array( 'end-times', 'jesus', 'quran', 'bible' ),
		'post:what-does-begotten-mean'                              => array( 'jesus', 'monotheism', 'early-church', 'christianity', 'islam' ),
		'post:harut-and-marut'                                      => array( 'babylon', 'quran', 'judaism' ),
		'post:deuteronomy-18-18'                                    => array( 'prophecy', 'moses', 'prophet-muhammad', 'ishmael', 'bible' ),
		'post:muhammad-in-the-bible'                                => array( 'prophet-muhammad', 'prophecy', 'bible', 'quran' ),
		'post:jews-under-muslim-rule'                               => array( 'judaism', 'islam' ),
	),
);
