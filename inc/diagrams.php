<?php
/**
 * Diagrams drawn in SVG: [abr_diagram name="family-tree"] and
 * [abr_diagram name="shared-beliefs"].
 *
 * Kept in PHP so the drawings survive content filtering, use the scheme
 * colours through CSS classes (assets/css/theme.css, "Diagrams"), follow light
 * and dark mode, and scale to any width through their viewBox.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * One labelled box.
 *
 * @param int    $x     Left.
 * @param int    $y     Top.
 * @param int    $w     Width.
 * @param string $label Main line.
 * @param string $sub   Second line.
 * @param string $class Extra class.
 * @return string
 */
function abr_diagram_node( $x, $y, $w, $label, $sub = '', $class = '' ) {
	$h   = $sub ? 54 : 38;
	$out = sprintf( '<g class="abr-dg-node %s"><rect x="%d" y="%d" width="%d" height="%d" rx="8"/>', esc_attr( $class ), $x, $y, $w, $h );
	$out .= sprintf( '<text x="%d" y="%d" class="abr-dg-label">%s</text>', $x + $w / 2, $y + 24, esc_html( $label ) );
	if ( $sub ) {
		$out .= sprintf( '<text x="%d" y="%d" class="abr-dg-sub">%s</text>', $x + $w / 2, $y + 42, esc_html( $sub ) );
	}
	return $out . '</g>';
}

/**
 * A connecting line.
 *
 * @param int  $x1 Start x.
 * @param int  $y1 Start y.
 * @param int  $x2 End x.
 * @param int  $y2 End y.
 * @param bool $dashed Dashed for gaps of many generations.
 * @return string
 */
function abr_diagram_line( $x1, $y1, $x2, $y2, $dashed = false ) {
	return sprintf( '<path class="abr-dg-line%s" d="M%d %dV%dH%dV%d"/>', $dashed ? ' is-gap' : '', $x1, $y1, (int) ( ( $y1 + $y2 ) / 2 ), $x2, $y2 );
}

/**
 * The family of Abraham.
 *
 * @return string
 */
function abr_diagram_family_tree() {
	$n = 'abr_diagram_node';
	$l = 'abr_diagram_line';
	$s = '<svg viewBox="0 0 1040 810" role="img" aria-labelledby="abr-dg-tree-t abr-dg-tree-d" class="abr-dg">'
		. '<title id="abr-dg-tree-t">' . esc_html__( 'The family of Abraham', 'abrahamic' ) . '</title>'
		. '<desc id="abr-dg-tree-d">' . esc_html__( 'From Adam through Noah and Shem to Abraham, whose sons Ishmael and Isaac head the two lines that lead to Muhammad and to the prophets of Israel and Jesus. Beside Shem stand the Mandaeans, who trace their descent through Seth and Shem and do not count Abraham among their prophets; a dotted line joins them to John the Baptist, whom they honour as their great teacher.', 'abrahamic' ) . '</desc>';
	// Before Abraham.
	$s .= $n( 400, 20, 160, 'Adam', 'Ādam' ) . $l( 480, 74, 480, 104 );
	$s .= $n( 400, 104, 160, 'Seth', 'Shīth' ) . $l( 480, 158, 480, 188, true );
	$s .= $n( 400, 188, 160, 'Noah', 'Nūḥ' ) . $l( 480, 242, 480, 272 );
	$s .= $n( 400, 272, 160, 'Shem', 'Sām' ) . $l( 480, 326, 480, 356, true );
	// The Mandaean line branches from Shem and does not pass through Abraham.
	$s .= '<path class="abr-dg-line is-gap is-mandaean" d="M560 299H690"/>';
	$s .= $n( 690, 272, 250, 'The Mandaeans', 'line of Seth and Shem', 'is-mandaean' );
	// The Mandaeans honour John the Baptist as their teacher: a dotted line round the
	// right of the tree and beneath it, so it crosses no other line or box.
	$s .= '<path class="abr-dg-line is-honour is-mandaean" d="M940 299H1005V790H600V756"/>';
	$s .= '<text x="800" y="782" class="abr-dg-honour">' . esc_html__( 'honoured by the Mandaeans as their great teacher', 'abrahamic' ) . '</text>';
	$s .= $n( 380, 356, 200, 'Abraham', 'Ibrāhīm', 'is-key' );
	// Two sons.
	$s .= $l( 480, 410, 230, 450 ) . $l( 480, 410, 730, 450 );
	$s .= $n( 130, 450, 200, 'Ishmael', 'Ismāʿīl · son of Hagar' );
	$s .= $n( 630, 450, 200, 'Isaac', 'Isḥāq · son of Sarah' );
	// Line of Ishmael.
	$s .= $l( 230, 504, 230, 534 ) . $n( 130, 534, 200, 'Nebaioth and Kedar', 'Nābit · Qaydhār' );
	$s .= $l( 230, 588, 230, 618, true ) . $n( 130, 618, 200, 'ʿAdnān', 'the Arabs of the north' );
	$s .= $l( 230, 672, 230, 702, true ) . $n( 130, 702, 200, 'Muhammad', '', 'is-key' );
	// Line of Isaac.
	$s .= $l( 730, 504, 730, 534 ) . $n( 630, 534, 200, 'Jacob (Israel)', 'Yaʿqūb' );
	$s .= $l( 730, 588, 600, 618 ) . $l( 730, 588, 860, 618 );
	$s .= $n( 510, 618, 180, 'Levi', 'Moses · Aaron' ) . $n( 770, 618, 180, 'Judah', 'David · Solomon' );
	$s .= $l( 600, 672, 600, 702, true ) . $n( 510, 702, 180, 'John the Baptist', 'Yaḥyā' );
	$s .= $l( 860, 672, 860, 702, true ) . $n( 770, 702, 180, 'Jesus', 'ʿĪsā', 'is-key' );
	// Key.
	$s .= '<g class="abr-dg-key"><path class="abr-dg-line" d="M20 30h34"/><text x="62" y="34">' . esc_html__( 'son', 'abrahamic' ) . '</text>'
		. '<path class="abr-dg-line is-gap" d="M20 54h34"/><text x="62" y="58">' . esc_html__( 'many generations', 'abrahamic' ) . '</text>'
		. '<path class="abr-dg-line is-honour is-mandaean" d="M20 78h34"/><text x="62" y="82">' . esc_html__( 'honoured as teacher', 'abrahamic' ) . '</text></g>';
	return $s . '</svg>';
}

/**
 * What Judaism, Christianity and Islam share.
 *
 * @return string
 */
function abr_diagram_shared_beliefs() {
	$t = function ( $x, $y, $lines, $class = '' ) {
		$o = '';
		foreach ( (array) $lines as $i => $line ) {
			$o .= sprintf( '<text x="%d" y="%d" class="abr-dg-venn-text %s">%s</text>', $x, $y + $i * 20, esc_attr( $class ), esc_html( $line ) );
		}
		return $o;
	};
	// Circles for Judaism, Christianity and Islam; an ellipse for Mandaeism,
	// placed (and checked region by region) so that it meets only the areas
	// Mandaeism shares: the centre, John the Baptist, and baptism.
	$s  = '<svg viewBox="0 0 1000 760" role="img" aria-labelledby="abr-dg-venn-t abr-dg-venn-d" class="abr-dg">'
		. '<title id="abr-dg-venn-t">' . esc_html__( 'What Judaism, Mandaeism, Christianity and Islam share', 'abrahamic' ) . '</title>'
		. '<desc id="abr-dg-venn-d">' . esc_html__( 'Four overlapping sets. All four hold to one God, to revealed scripture and to a judgement after death. Judaism, Christianity and Islam also share Abraham and the prophets. Judaism and Christianity share the Hebrew Bible; Christianity and Islam share Jesus as Messiah, his virgin birth and his return; Judaism and Islam share an undivided God and a religious law for daily life. Mandaeism shares with Christianity and Islam the honour given to John the Baptist, and with Christianity baptism.', 'abrahamic' ) . '</desc>';
	$s .= '<circle class="abr-dg-set is-judaism" cx="340" cy="290" r="230"/>';
	$s .= '<circle class="abr-dg-set is-christianity" cx="620" cy="290" r="230"/>';
	$s .= '<circle class="abr-dg-set is-islam" cx="480" cy="510" r="230"/>';
	$s .= '<ellipse class="abr-dg-set is-mandaeism" cx="715" cy="375" rx="260" ry="90"/>';
	$s .= '<text x="215" y="110" class="abr-dg-venn-head">' . esc_html__( 'Judaism', 'abrahamic' ) . '</text>';
	$s .= '<text x="745" y="110" class="abr-dg-venn-head">' . esc_html__( 'Christianity', 'abrahamic' ) . '</text>';
	$s .= '<text x="480" y="740" class="abr-dg-venn-head">' . esc_html__( 'Islam', 'abrahamic' ) . '</text>';
	$s .= '<text x="880" y="500" class="abr-dg-venn-head is-mandaeism">' . esc_html__( 'Mandaeism', 'abrahamic' ) . '</text>';
	// One tradition only.
	$s .= $t( 250, 220, array( __( 'Israel as the', 'abrahamic' ), __( 'covenant people', 'abrahamic' ), __( 'The Talmud', 'abrahamic' ) ) );
	$s .= $t( 700, 170, array( __( 'The Trinity', 'abrahamic' ), __( 'The crucifixion', 'abrahamic' ), __( 'as atonement', 'abrahamic' ), __( 'The New Testament', 'abrahamic' ) ) );
	$s .= $t( 480, 625, array( __( 'Muhammad, the', 'abrahamic' ), __( 'final prophet', 'abrahamic' ), __( 'The Qur’an', 'abrahamic' ) ) );
	$s .= $t( 895, 350, array( __( 'Repeated', 'abrahamic' ), __( 'baptism in', 'abrahamic' ), __( 'running water', 'abrahamic' ), __( 'Ginza Rabba', 'abrahamic' ) ) );
	// Two traditions.
	$s .= $t( 480, 185, array( __( 'The Hebrew Bible', 'abrahamic' ), __( 'as scripture', 'abrahamic' ) ) );
	$s .= $t( 335, 410, array( __( 'One undivided God', 'abrahamic' ), __( 'A law for daily', 'abrahamic' ), __( 'life, diet and', 'abrahamic' ), __( 'circumcision', 'abrahamic' ) ) );
	$s .= $t( 590, 470, array( __( 'Jesus as Messiah,', 'abrahamic' ), __( 'virgin-born; his return', 'abrahamic' ) ) );
	$s .= $t( 770, 375, array( __( 'Baptism', 'abrahamic' ) ) );
	// Three traditions.
	$s .= $t( 425, 318, array( __( 'Abraham', 'abrahamic' ), __( 'The prophets', 'abrahamic' ) ) );
	$s .= $t( 620, 380, array( __( 'John the', 'abrahamic' ), __( 'Baptist', 'abrahamic' ) ) );
	// All four.
	$s .= $t( 508, 372, array( __( 'One God', 'abrahamic' ), __( 'Scripture', 'abrahamic' ), __( 'Judgement', 'abrahamic' ) ), 'is-shared' );
	return $s . '</svg>';
}

/**
 * The world's religious groups in 2020 (Pew Research Center, 2025), with the
 * Abrahamic religions highlighted.
 *
 * @return string
 */
function abr_diagram_world_religions() {
	$rows = array(
		array( __( 'Christians', 'abrahamic' ), 28.8, true ),
		array( __( 'Muslims', 'abrahamic' ), 25.6, true ),
		array( __( 'Unaffiliated', 'abrahamic' ), 24.2, false ),
		array( __( 'Hindus', 'abrahamic' ), 14.9, false ),
		array( __( 'Buddhists', 'abrahamic' ), 4.1, false ),
		array( __( 'Other religions', 'abrahamic' ), 2.2, false ),
		array( __( 'Jews', 'abrahamic' ), 0.2, true ),
	);
	$s = '<svg viewBox="0 0 960 460" role="img" aria-labelledby="abr-dg-world-t abr-dg-world-d" class="abr-dg">'
		. '<title id="abr-dg-world-t">' . esc_html__( 'The world\'s religious groups in 2020', 'abrahamic' ) . '</title>'
		. '<desc id="abr-dg-world-d">' . esc_html__( 'Share of the world population in 2020: Christians 28.8%, Muslims 25.6%, religiously unaffiliated 24.2%, Hindus 14.9%, Buddhists 4.1%, other religions 2.2%, Jews 0.2%. The three Abrahamic groups together make up 54.6%.', 'abrahamic' ) . '</desc>';
	$y = 30;
	foreach ( $rows as $row ) {
		$w = max( 3, round( $row[1] / 30 * 640 ) );
		$s .= sprintf( '<text x="190" y="%d" class="abr-dg-bar-label">%s</text>', $y + 27, esc_html( $row[0] ) );
		$s .= sprintf( '<rect x="210" y="%d" width="%d" height="40" rx="4" class="abr-dg-bar%s"/>', $y, $w, $row[2] ? ' is-abrahamic' : '' );
		$s .= sprintf( '<text x="%d" y="%d" class="abr-dg-bar-value">%s%%</text>', 222 + $w, $y + 27, esc_html( number_format_i18n( $row[1], 1 ) ) );
		$y += 56;
	}
	$s .= '<g class="abr-dg-key"><rect x="210" y="' . ( $y + 6 ) . '" width="18" height="18" rx="3" class="abr-dg-bar is-abrahamic"/><text x="236" y="' . ( $y + 20 ) . '">' . esc_html__( 'Abrahamic religions: 54.6% together', 'abrahamic' ) . '</text></g>';
	return $s . '</svg>';
}

add_shortcode(
	'abr_diagram',
	function ( $atts ) {
		$atts = shortcode_atts( array( 'name' => '', 'caption' => '' ), $atts, 'abr_diagram' );
		$map  = array(
			'family-tree'    => 'abr_diagram_family_tree',
			'shared-beliefs' => 'abr_diagram_shared_beliefs',
			'world-religions' => 'abr_diagram_world_religions',
		);
		if ( ! isset( $map[ $atts['name'] ] ) ) {
			return '';
		}
		$caption = $atts['caption'] ? '<figcaption>' . esc_html( $atts['caption'] ) . '</figcaption>' : '';
		return '<figure class="abr-diagram abr-diagram--' . esc_attr( $atts['name'] ) . '">' . call_user_func( $map[ $atts['name'] ] ) . $caption . '</figure>';
	}
);
