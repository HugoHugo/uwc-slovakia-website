<?php
/**
 * SVG Icons class
 *
 * @package Gutenix
 * @since 1.0.0
 */

/**
 * This class is in charge of displaying SVG icons across the site.
 *
 * Place each <svg> source on its own array key, without adding the
 * both `width` and `height` attributes, since these are added dynamically,
 * before rendering the SVG code.
 *
 * All icons are assumed to have equal width and height, hence the option
 * to only specify a `$size` parameter in the svg methods.
 *
 * @since 1.0.0
 */
class Gutenix_SVG_Icons {

	/**
	 * Gets the SVG code for a given icon.
	 *
	 * @since  1.0.0
	 * @param  string $icon          Icon name.
	 * @param  array|string $classes Additional CSS classes
	 * @return null|string
	 */
	public static function get_svg( $icon = '', $classes = array() ) {
		$arr = self::$ui_icons;

		$classes   = (array) $classes;
		$classes[] = 'svg-icon';

		if ( array_key_exists( $icon, $arr ) ) {
			$repl = sprintf( '<svg class="%s" aria-hidden="true" role="img" focusable="false" ', esc_attr( join( ' ', $classes ) ) );
			$svg  = preg_replace( '/^<svg /', $repl, trim( $arr[ $icon ] ) ); // Add extra attributes to SVG code.
			$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
			$svg  = preg_replace( '/>\s*</', '><', $svg ); // Remove white space between SVG tags.

			return $svg;
		}

		return null;
	}

	/**
	 * User Interface icons – svg sources.
	 *
	 * @since 1.0.0
	 * @var   array
	 */
	static $ui_icons = array(
		'arrow-right' 	=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M9.29688 0L7.90625 1.46853L12.2031 5.95571H0V8.04429H12.2031L7.90625 12.5315L9.29688 14L16 7L9.29688 0Z"/></svg>',
		'arrow-left' 	=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M6.70312 14L8.09375 12.5315L3.79688 8.04429H16V5.95571H3.79688L8.09375 1.46853L6.70312 0L0 7L6.70312 14Z"/></svg>',
		'search' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M12.7188 11.3125C13.1667 10.7188 13.5156 10.0625 13.7656 9.34375C14.0156 8.625 14.1406 7.86979 14.1406 7.07812C14.1406 6.09896 13.9531 5.18229 13.5781 4.32812C13.2135 3.46354 12.7083 2.71354 12.0625 2.07812C11.4271 1.43229 10.6771 0.927083 9.8125 0.5625C8.95833 0.1875 8.04688 0 7.07812 0C6.09896 0 5.17708 0.1875 4.3125 0.5625C3.45833 0.927083 2.70833 1.43229 2.0625 2.07812C1.42708 2.71354 0.921875 3.46354 0.546875 4.32812C0.182292 5.18229 0 6.09896 0 7.07812C0 8.04688 0.182292 8.96354 0.546875 9.82812C0.921875 10.6823 1.42708 11.4323 2.0625 12.0781C2.70833 12.7135 3.45833 13.2188 4.3125 13.5938C5.17708 13.9583 6.09896 14.1406 7.07812 14.1406C7.86979 14.1406 8.625 14.0156 9.34375 13.7656C10.0625 13.5156 10.7188 13.1667 11.3125 12.7188L14.2969 15.7031C14.3906 15.8073 14.5 15.8802 14.625 15.9219C14.75 15.974 14.875 16 15 16C15.125 16 15.25 15.974 15.375 15.9219C15.5 15.8802 15.6094 15.8073 15.7031 15.7031C15.901 15.5052 16 15.2708 16 15C16 14.7292 15.901 14.4948 15.7031 14.2969L12.7188 11.3125ZM7.07812 12.1406C6.36979 12.1406 5.70833 12.0104 5.09375 11.75C4.47917 11.4792 3.94271 11.1146 3.48438 10.6562C3.02604 10.1979 2.66146 9.66146 2.39062 9.04688C2.13021 8.43229 2 7.77604 2 7.07812C2 6.36979 2.13021 5.70833 2.39062 5.09375C2.66146 4.47917 3.02604 3.94271 3.48438 3.48438C3.94271 3.02604 4.47917 2.66667 5.09375 2.40625C5.70833 2.13542 6.36979 2 7.07812 2C7.77604 2 8.43229 2.13542 9.04688 2.40625C9.66146 2.66667 10.1979 3.02604 10.6562 3.48438C11.1146 3.94271 11.474 4.47917 11.7344 5.09375C12.0052 5.70833 12.1406 6.36979 12.1406 7.07812C12.1406 7.77604 12.0052 8.43229 11.7344 9.04688C11.474 9.66146 11.1146 10.1979 10.6562 10.6562C10.1979 11.1146 9.66146 11.4792 9.04688 11.75C8.43229 12.0104 7.77604 12.1406 7.07812 12.1406Z"/></svg>',
		'close' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6607 0.339286C15.4345 0.113095 15.1667 0 14.8571 0C14.5476 0 14.2798 0.113095 14.0536 0.339286L8 6.39286L1.94643 0.339286C1.72024 0.113095 1.45238 0 1.14286 0C0.833333 0 0.565476 0.113095 0.339286 0.339286C0.113095 0.565476 0 0.833333 0 1.14286C0 1.45238 0.113095 1.72024 0.339286 1.94643L6.39286 8L0.339286 14.0536C0.113095 14.2798 0 14.5476 0 14.8571C0 15.1667 0.113095 15.4345 0.339286 15.6607C0.446429 15.7798 0.571429 15.869 0.714286 15.9286C0.857143 15.9762 1 16 1.14286 16C1.28571 16 1.42857 15.9762 1.57143 15.9286C1.71429 15.869 1.83929 15.7798 1.94643 15.6607L8 9.60714L14.0536 15.6607C14.1607 15.7798 14.2857 15.869 14.4286 15.9286C14.5714 15.9762 14.7143 16 14.8571 16C15 16 15.1429 15.9762 15.2857 15.9286C15.4286 15.869 15.5536 15.7798 15.6607 15.6607C15.8869 15.4345 16 15.1667 16 14.8571C16 14.5476 15.8869 14.2798 15.6607 14.0536L9.60714 8L15.6607 1.94643C15.8869 1.72024 16 1.45238 16 1.14286C16 0.833333 15.8869 0.565476 15.6607 0.339286Z"/></svg>',
		'sticky' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M298.028 214.267L285.793 96H328c13.255 0 24-10.745 24-24V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v48c0 13.255 10.745 24 24 24h42.207L85.972 214.267C37.465 236.82 0 277.261 0 328c0 13.255 10.745 24 24 24h136v104.007c0 1.242.289 2.467.845 3.578l24 48c2.941 5.882 11.364 5.893 14.311 0l24-48a8.008 8.008 0 0 0 .845-3.578V352h136c13.255 0 24-10.745 24-24-.001-51.183-37.983-91.42-85.973-113.733z"></path></svg>',
		'cart' 			=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.0386 3H4.51157L4.01028 0.796875C3.95806 0.546875 3.83796 0.354167 3.64998 0.21875C3.47244 0.0729167 3.25835 0 3.00771 0H0V2H2.20879L4.01028 10.2031C4.0625 10.4531 4.17738 10.651 4.35491 10.7969C4.5429 10.9323 4.76221 11 5.01285 11H13.0334C13.2318 11 13.4198 10.9323 13.5974 10.7969C13.7749 10.6615 13.8898 10.4948 13.942 10.2969L15.9471 4.29688C16.0411 4.04688 16.0098 3.77083 15.8531 3.46875C15.7069 3.15625 15.4354 3 15.0386 3ZM7.01799 14C7.01799 14.5521 6.81956 15.0208 6.42271 15.4062C6.03631 15.8021 5.56635 16 5.01285 16C4.45935 16 3.98417 15.8021 3.58732 15.4062C3.20091 15.0208 3.00771 14.5521 3.00771 14C3.00771 13.4479 3.20091 12.9792 3.58732 12.5938C3.98417 12.1979 4.45935 12 5.01285 12C5.56635 12 6.03631 12.1979 6.42271 12.5938C6.81956 12.9792 7.01799 13.4479 7.01799 14ZM15.0386 14C15.0386 14.5521 14.8401 15.0208 14.4433 15.4062C14.0569 15.8021 13.5869 16 13.0334 16C12.4799 16 12.0047 15.8021 11.6079 15.4062C11.2215 15.0208 11.0283 14.5521 11.0283 14C11.0283 13.4479 11.2215 12.9792 11.6079 12.5938C12.0047 12.1979 12.4799 12 13.0334 12C13.5869 12 14.0569 12.1979 14.4433 12.5938C14.8401 12.9792 15.0386 13.4479 15.0386 14Z"/></svg>',
		'like' 			=> '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 475.099 475.099" xml:space="preserve"><path d="M442.829,265.532c9.328-14.089,13.986-29.598,13.986-46.538c0-19.607-7.225-36.637-21.687-51.117 c-14.469-14.465-31.601-21.696-51.394-21.696h-50.251c9.134-18.842,13.709-37.117,13.709-54.816c0-22.271-3.34-39.971-9.996-53.105 c-6.663-13.138-16.372-22.795-29.126-28.984C295.313,3.09,280.947,0,264.959,0c-9.712,0-18.274,3.521-25.697,10.566 c-8.183,7.993-14.084,18.274-17.699,30.837c-3.617,12.559-6.521,24.6-8.708,36.116c-2.187,11.515-5.569,19.652-10.135,24.41 c-9.329,10.088-19.511,22.273-30.551,36.547c-19.224,24.932-32.264,39.685-39.113,44.255H54.828 c-10.088,0-18.702,3.574-25.84,10.706c-7.135,7.139-10.705,15.752-10.705,25.841v182.723c0,10.089,3.566,18.699,10.705,25.838 c7.142,7.139,15.752,10.711,25.84,10.711h82.221c4.188,0,17.319,3.806,39.399,11.42c23.413,8.186,44.017,14.418,61.812,18.702 c17.797,4.284,35.832,6.427,54.106,6.427h26.545h10.284c26.836,0,48.438-7.666,64.809-22.99 c16.365-15.324,24.458-36.213,24.27-62.67c11.42-14.657,17.129-31.597,17.129-50.819c0-4.185-0.281-8.277-0.855-12.278 c7.23-12.748,10.854-26.453,10.854-41.11C445.399,278.379,444.544,271.809,442.829,265.532z M85.949,396.58 c-3.616,3.614-7.898,5.428-12.847,5.428c-4.95,0-9.233-1.813-12.85-5.428c-3.615-3.613-5.424-7.897-5.424-12.85 c0-4.948,1.805-9.229,5.424-12.847c3.621-3.617,7.9-5.425,12.85-5.425c4.949,0,9.231,1.808,12.847,5.425 c3.617,3.617,5.426,7.898,5.426,12.847C91.375,388.683,89.566,392.967,85.949,396.58z M414.145,242.419 c-4.093,8.754-9.186,13.227-15.276,13.415c2.854,3.237,5.235,7.762,7.139,13.562c1.902,5.807,2.847,11.087,2.847,15.848 c0,13.127-5.037,24.455-15.126,33.969c3.43,6.088,5.141,12.658,5.141,19.697c0,7.043-1.663,14.038-4.996,20.984 c-3.327,6.94-7.851,11.938-13.559,14.982c0.951,5.709,1.423,11.04,1.423,15.988c0,31.785-18.274,47.678-54.823,47.678h-34.536 c-24.94,0-57.483-6.943-97.648-20.841c-0.953-0.38-3.709-1.383-8.28-2.998s-7.948-2.806-10.138-3.565 c-2.19-0.767-5.518-1.861-9.994-3.285c-4.475-1.431-8.087-2.479-10.849-3.142c-2.758-0.664-5.901-1.283-9.419-1.855 c-3.52-0.571-6.519-0.855-8.993-0.855h-9.136V219.285h9.136c3.045,0,6.423-0.859,10.135-2.568c3.711-1.714,7.52-4.283,11.421-7.71 c3.903-3.427,7.564-6.805,10.992-10.138c3.427-3.33,7.233-7.517,11.422-12.559c4.187-5.046,7.47-9.089,9.851-12.135 c2.378-3.045,5.375-6.949,8.992-11.707c3.615-4.757,5.806-7.613,6.567-8.566c10.467-12.941,17.795-21.601,21.982-25.981 c7.804-8.182,13.466-18.603,16.987-31.261c3.525-12.66,6.427-24.604,8.703-35.832c2.282-11.229,5.903-19.321,10.858-24.27 c18.268,0,30.453,4.471,36.542,13.418c6.088,8.945,9.134,22.746,9.134,41.399c0,11.229-4.572,26.503-13.71,45.821 c-9.134,19.32-13.698,34.5-13.698,45.539h100.495c9.527,0,17.993,3.662,25.413,10.994c7.426,7.327,11.143,15.843,11.143,25.553 C420.284,225.943,418.237,233.653,414.145,242.419z"/></svg>',
		'like-square' 	=> '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.814 456.814" xml:space="preserve"><path d="M441.11,252.677c10.468-11.99,15.704-26.169,15.704-42.54c0-14.846-5.432-27.692-16.259-38.547 c-10.849-10.854-23.695-16.278-38.541-16.278h-79.082c0.76-2.664,1.522-4.948,2.282-6.851c0.753-1.903,1.811-3.999,3.138-6.283 c1.328-2.285,2.283-3.999,2.852-5.139c3.425-6.468,6.047-11.801,7.857-15.985c1.807-4.192,3.606-9.9,5.42-17.133 c1.811-7.229,2.711-14.465,2.711-21.698c0-4.566-0.055-8.281-0.145-11.134c-0.089-2.855-0.574-7.139-1.423-12.85 c-0.862-5.708-2.006-10.467-3.43-14.272c-1.43-3.806-3.716-8.092-6.851-12.847c-3.142-4.764-6.947-8.613-11.424-11.565 c-4.476-2.95-10.184-5.424-17.131-7.421c-6.954-1.999-14.801-2.998-23.562-2.998c-4.948,0-9.227,1.809-12.847,5.426 c-3.806,3.806-7.047,8.564-9.709,14.272c-2.666,5.711-4.523,10.66-5.571,14.849c-1.047,4.187-2.238,9.994-3.565,17.415 c-1.719,7.998-2.998,13.752-3.86,17.273c-0.855,3.521-2.525,8.136-4.997,13.845c-2.477,5.713-5.424,10.278-8.851,13.706 c-6.28,6.28-15.891,17.701-28.837,34.259c-9.329,12.18-18.94,23.695-28.837,34.545c-9.899,10.852-17.131,16.466-21.698,16.847 c-4.755,0.38-8.848,2.331-12.275,5.854c-3.427,3.521-5.14,7.662-5.14,12.419v183.01c0,4.949,1.807,9.182,5.424,12.703 c3.615,3.525,7.898,5.38,12.847,5.571c6.661,0.191,21.698,4.374,45.111,12.566c14.654,4.941,26.12,8.706,34.4,11.272 c8.278,2.566,19.849,5.328,34.684,8.282c14.849,2.949,28.551,4.428,41.11,4.428h4.855h21.7h10.276 c25.321-0.38,44.061-7.806,56.247-22.268c11.036-13.135,15.697-30.361,13.99-51.679c7.422-7.042,12.565-15.984,15.416-26.836 c3.231-11.604,3.231-22.74,0-33.397c8.754-11.611,12.847-24.649,12.272-39.115C445.395,268.286,443.971,261.055,441.11,252.677z"/><path d="M100.5,191.864H18.276c-4.952,0-9.235,1.809-12.851,5.426C1.809,200.905,0,205.188,0,210.137v182.732 c0,4.942,1.809,9.227,5.426,12.847c3.619,3.611,7.902,5.421,12.851,5.421H100.5c4.948,0,9.229-1.81,12.847-5.421 c3.616-3.62,5.424-7.904,5.424-12.847V210.137c0-4.949-1.809-9.231-5.424-12.847C109.73,193.672,105.449,191.864,100.5,191.864z M67.665,369.308c-3.616,3.521-7.898,5.281-12.847,5.281c-5.14,0-9.471-1.76-12.99-5.281c-3.521-3.521-5.281-7.85-5.281-12.99 c0-4.948,1.759-9.232,5.281-12.847c3.52-3.617,7.85-5.428,12.99-5.428c4.949,0,9.231,1.811,12.847,5.428 c3.617,3.614,5.426,7.898,5.426,12.847C73.091,361.458,71.286,365.786,67.665,369.308z"/></svg>',
		'facebook' 		=> '<svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1343 12v264h-157q-86 0-116 36t-30 108v189h293l-39 296h-254v759h-306v-759h-255v-296h255v-218q0-186 104-288.5t277-102.5q147 0 228 12z"/></svg>',
		'twitter' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5t-115.5 248.5-184.5 210.5-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5t-114-159.5q33 5 61 5 43 0 85-11-112-23-185.5-111.5t-73.5-205.5v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5t371.5 99.5q-8-38-8-74 0-134 94.5-228.5t228.5-94.5q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z"></path></svg>',
		'linkedin' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M477 625v991h-330v-991h330zm21-306q1 73-50.5 122t-135.5 49h-2q-82 0-132-49t-50-122q0-74 51.5-122.5t134.5-48.5 133 48.5 51 122.5zm1166 729v568h-329v-530q0-105-40.5-164.5t-126.5-59.5q-63 0-105.5 34.5t-63.5 85.5q-11 30-11 81v553h-329q2-399 2-647t-1-296l-1-48h329v144h-2q20-32 41-56t56.5-52 87-43.5 114.5-15.5q171 0 275 113.5t104 332.5z"></path></svg>',
		'pinterest' 	=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103q-111 0-218-32 59-93 78-164 9-34 54-211 20 39 73 67.5t114 28.5q121 0 216-68.5t147-188.5 52-270q0-114-59.5-214t-172.5-163-255-63q-105 0-196 29t-154.5 77-109 110.5-67 129.5-21.5 134q0 104 40 183t117 111q30 12 38-20 2-7 8-31t8-30q6-23-11-43-51-61-51-151 0-151 104.5-259.5t273.5-108.5q151 0 235.5 82t84.5 213q0 170-68.5 289t-175.5 119q-61 0-98-43.5t-23-104.5q8-35 26.5-93.5t30-103 11.5-75.5q0-50-27-83t-77-33q-62 0-105 57t-43 142q0 73 25 122l-99 418q-17 70-13 177-206-91-333-281t-127-423q0-209 103-385.5t279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>',
		'tumblr' 		=> '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.542 438.543" xml:space="preserve"><path d="M288.078,367.164c-12.748,0-23.887-2.95-33.4-8.85c-7.427-4.381-12.368-10.089-14.842-17.132 c-2.673-6.852-4.001-23.223-4.001-49.115V179.58h103.921v-68.806H235.834V0h-62.53c-2.856,22.458-7.992,41.109-15.415,55.963 c-7.424,14.655-17.227,27.218-29.408,37.685c-12.183,10.282-26.934,18.276-44.255,23.984v61.955h48.535v153.889 c0,20.365,2.096,35.69,6.28,45.967c3.999,10.283,11.519,20.272,22.557,29.981c11.419,9.514,24.554,16.652,39.399,21.406 c15.418,5.14,33.12,7.713,53.105,7.713c18.274,0,34.735-1.813,49.392-5.428c14.466-3.237,31.409-9.424,50.823-18.562V345.46 C332.425,359.933,310.349,367.164,288.078,367.164z"/></svg>',
		'vk' 			=> '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 548.358 548.358" xml:space="preserve"><path d="M545.451,400.298c-0.664-1.431-1.283-2.618-1.858-3.569c-9.514-17.135-27.695-38.167-54.532-63.102l-0.567-0.571 l-0.284-0.28l-0.287-0.287h-0.288c-12.18-11.611-19.893-19.418-23.123-23.415c-5.91-7.614-7.234-15.321-4.004-23.13 c2.282-5.9,10.854-18.36,25.696-37.397c7.807-10.089,13.99-18.175,18.556-24.267c32.931-43.78,47.208-71.756,42.828-83.939 l-1.701-2.847c-1.143-1.714-4.093-3.282-8.846-4.712c-4.764-1.427-10.853-1.663-18.278-0.712l-82.224,0.568 c-1.332-0.472-3.234-0.428-5.712,0.144c-2.475,0.572-3.713,0.859-3.713,0.859l-1.431,0.715l-1.136,0.859 c-0.952,0.568-1.999,1.567-3.142,2.995c-1.137,1.423-2.088,3.093-2.848,4.996c-8.952,23.031-19.13,44.444-30.553,64.238 c-7.043,11.803-13.511,22.032-19.418,30.693c-5.899,8.658-10.848,15.037-14.842,19.126c-4,4.093-7.61,7.372-10.852,9.849 c-3.237,2.478-5.708,3.525-7.419,3.142c-1.715-0.383-3.33-0.763-4.859-1.143c-2.663-1.714-4.805-4.045-6.42-6.995 c-1.622-2.95-2.714-6.663-3.285-11.136c-0.568-4.476-0.904-8.326-1-11.563c-0.089-3.233-0.048-7.806,0.145-13.706 c0.198-5.903,0.287-9.897,0.287-11.991c0-7.234,0.141-15.085,0.424-23.555c0.288-8.47,0.521-15.181,0.716-20.125 c0.194-4.949,0.284-10.185,0.284-15.705s-0.336-9.849-1-12.991c-0.656-3.138-1.663-6.184-2.99-9.137 c-1.335-2.95-3.289-5.232-5.853-6.852c-2.569-1.618-5.763-2.902-9.564-3.856c-10.089-2.283-22.936-3.518-38.547-3.71 c-35.401-0.38-58.148,1.906-68.236,6.855c-3.997,2.091-7.614,4.948-10.848,8.562c-3.427,4.189-3.905,6.475-1.431,6.851 c11.422,1.711,19.508,5.804,24.267,12.275l1.715,3.429c1.334,2.474,2.666,6.854,3.999,13.134c1.331,6.28,2.19,13.227,2.568,20.837 c0.95,13.897,0.95,25.793,0,35.689c-0.953,9.9-1.853,17.607-2.712,23.127c-0.859,5.52-2.143,9.993-3.855,13.418 c-1.715,3.426-2.856,5.52-3.428,6.28c-0.571,0.76-1.047,1.239-1.425,1.427c-2.474,0.948-5.047,1.431-7.71,1.431 c-2.667,0-5.901-1.334-9.707-4c-3.805-2.666-7.754-6.328-11.847-10.992c-4.093-4.665-8.709-11.184-13.85-19.558 c-5.137-8.374-10.467-18.271-15.987-29.691l-4.567-8.282c-2.855-5.328-6.755-13.086-11.704-23.267 c-4.952-10.185-9.329-20.037-13.134-29.554c-1.521-3.997-3.806-7.04-6.851-9.134l-1.429-0.859c-0.95-0.76-2.475-1.567-4.567-2.427 c-2.095-0.859-4.281-1.475-6.567-1.854l-78.229,0.568c-7.994,0-13.418,1.811-16.274,5.428l-1.143,1.711 C0.288,140.146,0,141.668,0,143.763c0,2.094,0.571,4.664,1.714,7.707c11.42,26.84,23.839,52.725,37.257,77.659 c13.418,24.934,25.078,45.019,34.973,60.237c9.897,15.229,19.985,29.602,30.264,43.112c10.279,13.515,17.083,22.176,20.412,25.981 c3.333,3.812,5.951,6.662,7.854,8.565l7.139,6.851c4.568,4.569,11.276,10.041,20.127,16.416 c8.853,6.379,18.654,12.659,29.408,18.85c10.756,6.181,23.269,11.225,37.546,15.126c14.275,3.905,28.169,5.472,41.684,4.716h32.834 c6.659-0.575,11.704-2.669,15.133-6.283l1.136-1.431c0.764-1.136,1.479-2.901,2.139-5.276c0.668-2.379,1-5,1-7.851 c-0.195-8.183,0.428-15.558,1.852-22.124c1.423-6.564,3.045-11.513,4.859-14.846c1.813-3.33,3.859-6.14,6.136-8.418 c2.282-2.283,3.908-3.666,4.862-4.142c0.948-0.479,1.705-0.804,2.276-0.999c4.568-1.522,9.944-0.048,16.136,4.429 c6.187,4.473,11.99,9.996,17.418,16.56c5.425,6.57,11.943,13.941,19.555,22.124c7.617,8.186,14.277,14.271,19.985,18.274 l5.708,3.426c3.812,2.286,8.761,4.38,14.853,6.283c6.081,1.902,11.409,2.378,15.984,1.427l73.087-1.14 c7.229,0,12.854-1.197,16.844-3.572c3.998-2.379,6.373-5,7.139-7.851c0.764-2.854,0.805-6.092,0.145-9.712 C546.782,404.25,546.115,401.725,545.451,400.298z"/></svg>',
		'whatsapp' 		=> '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"><path d="M256.064,0h-0.128C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104l98.4-31.456 C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z M405.024,361.504 c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264C189.888,347.2,141.44,270.752,137.664,265.792 c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304c6.176-6.304,16.384-9.184,26.176-9.184 c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64c6.176,14.88,21.216,51.616,23.008,55.392 c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744c-3.776,4.352-7.36,7.68-11.136,12.352 c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616c28.576,25.44,51.744,33.568,60.032,37.024 c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496c5.12-7.232,11.584-8.128,18.368-5.568 c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736C411.2,329.152,411.2,344.032,405.024,361.504z"/></svg>',
		'email' 		=> '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 395 395" xml:space="preserve"><polygon points="395,320.089 395,74.911 258.806,197.5"/><polygon points="197.5,252.682 158.616,217.682 22.421,340.271 372.579,340.271 236.384,217.682"/><polygon points="372.579,54.729 22.421,54.729 197.5,212.318"/><polygon points="0,74.911 0,320.089 136.194,197.5"/></svg>',
		'print' 		=> '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 475.078 475.077" xml:space="preserve"><path d="M458.959,217.124c-10.759-10.758-23.654-16.134-38.69-16.134h-18.268v-73.089c0-7.611-1.91-15.99-5.719-25.122 c-3.806-9.136-8.371-16.368-13.699-21.698L339.18,37.683c-5.328-5.325-12.56-9.895-21.692-13.704 c-9.138-3.805-17.508-5.708-25.126-5.708H100.5c-7.614,0-14.087,2.663-19.417,7.993c-5.327,5.327-7.994,11.799-7.994,19.414V200.99 H54.818c-15.037,0-27.932,5.379-38.688,16.134C5.376,227.876,0,240.772,0,255.81v118.773c0,2.478,0.905,4.609,2.712,6.426 c1.809,1.804,3.951,2.707,6.423,2.707h63.954v45.68c0,7.617,2.664,14.089,7.994,19.417c5.33,5.325,11.803,7.994,19.417,7.994 h274.083c7.611,0,14.093-2.669,19.418-7.994c5.328-5.332,7.994-11.8,7.994-19.417v-45.68h63.953c2.471,0,4.613-0.903,6.42-2.707 c1.807-1.816,2.71-3.948,2.71-6.426V255.81C475.082,240.772,469.708,227.876,458.959,217.124z M365.449,420.262H109.636v-73.087 h255.813V420.262z M365.449,237.537H109.636V54.816h182.726v45.679c0,7.614,2.669,14.083,7.991,19.414 c5.328,5.33,11.799,7.993,19.417,7.993h45.679V237.537z M433.116,268.656c-3.614,3.614-7.898,5.428-12.847,5.428 c-4.949,0-9.233-1.813-12.848-5.428c-3.613-3.61-5.42-7.898-5.42-12.847s1.807-9.232,5.42-12.847 c3.614-3.617,7.898-5.426,12.848-5.426c4.948,0,9.232,1.809,12.847,5.426c3.613,3.614,5.427,7.898,5.427,12.847 S436.733,265.046,433.116,268.656z"/></svg>',
	);
}

/**
 * Gets the SVG code for a given icon.
 *
 * @since  1.0.0
 * @param  string $icon          Icon name.
 * @param  array|string $classes Additional CSS classes
 * @return null|string
 */
function gutenix_get_icon_svg( $icon = '', $classes = array() ) {
	return Gutenix_SVG_Icons::get_svg( $icon, $classes );
}
