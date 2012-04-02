<?php

function uncdata($xml)
{
	// States:
	//
	//     'out'
	//     '<'
	//     '<!'
	//     '<!['
	//     '<![C'
	//     '<![CD'
	//     '<![CDAT'
	//     '<![CDATA'
	//     'in'
	//     ']'
	//     ']]'
	//
	// (Yes, the states a represented by strings.)
	//

	$state = 'out';

	$a = str_split($xml);

	$new_xml = '';

	foreach ($a AS $k => $v) {

		// Deal with "state".
		switch ( $state ) {
			case 'out':
				if ( '<' == $v ) {
					$state = $v;
				} else {
					$new_xml .= $v;
				}
				break;

			case '<':
				if ( '!' == $v  ) {
					$state = $state . $v;
				} else {
					$new_xml .= $state . $v;
					$state = 'out';
				}
				break;

			case '<!':
				if ( '[' == $v  ) {
					$state = $state . $v;
				} else {
					$new_xml .= $state . $v;
					$state = 'out';
				}
				break;

			case '<![':
				if ( 'C' == $v  ) {
					$state = $state . $v;
				} else {
					$new_xml .= $state . $v;
					$state = 'out';
				}
				break;

			case '<![C':
				if ( 'D' == $v  ) {
					$state = $state . $v;
				} else {
					$new_xml .= $state . $v;
					$state = 'out';
				}
				break;

			case '<![CD':
				if ( 'A' == $v  ) {
					$state = $state . $v;
				} else {
					$new_xml .= $state . $v;
					$state = 'out';
				}
				break;

			case '<![CDA':
				if ( 'T' == $v  ) {
					$state = $state . $v;
				} else {
					$new_xml .= $state . $v;
					$state = 'out';
				}
				break;

			case '<![CDAT':
				if ( 'A' == $v  ) {
					$state = $state . $v;
				} else {
					$new_xml .= $state . $v;
					$state = 'out';
				}
				break;

			case '<![CDATA':
				if ( '[' == $v  ) {


					$cdata = '';
					$state = 'in';
				} else {
					$new_xml .= $state . $v;
					$state = 'out';
				}
				break;

			case 'in':
				if ( ']' == $v ) {
					$state = $v;
				} else {
					$cdata .= $v;
				}
				break;

			case ']':
				if (  ']' == $v  ) {
					$state = $state . $v;
				} else {
					$cdata .= $state . $v;
					$state = 'in';
				}
				break;

			case ']]':
				if (  '>' == $v  ) {
					$new_xml .= str_replace('>','&gt;',
							str_replace('>','&lt;',
									str_replace('"','&quot;',
											str_replace('&','&amp;',
													$cdata))));
					$state = 'out';
				} else {
					$cdata .= $state . $v;
					$state = 'in';
				}
				break;
		} // switch

	}

	//
	// Return.
	//
	return $new_xml;

}
