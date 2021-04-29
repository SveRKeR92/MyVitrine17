===  Post grid and filter ultimate ===
Tags: post grid, post, post filter, post category filter, custom post grid, grid display, grid, content grid, filter, post designs, grid designs, wponlinesupport
Contributors: wponlinesupport, anoopranawat, pratik-jain
Requires at least: 4.0
Tested up to: 5.7.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, easy way to display WordPress post in grid view and post grid with filter. Also work with Gutenberg shortcode block. 

== Description ==
Easy way to display WordPress post in grid view and post grid with filter. Display anywhere via shortcode. lots more shortcode parameters give you extend as your needs.

Post grid and filter ultimate helps you to display any WordPress posts on any page, in responsive grid and list easily, without coding.

Check [Features and Demo](https://www.wponlinesupport.com/wp-plugin/post-grid-filter-ultimate/) for additional information.

**Also work with Gutenberg shortcode block.** 

= Features include: =
* Post grid with 2 designs.
* Post grid filter with 2 designs.
* Display recent posts in a second.
* Display posts on page, sidebar widgets, theme file.
* Sort posts by title, date, ID
* Display featured image in any size (thumbnail, medium, large, full)
* Limit number of posts to display
* Enable/Disable pagination (2 type of paginations)
* Lost of shortcode parameters.
* Fully Responsive.
* 100% Multilanguage.

= Plugin contains 2 shortcodes =
<code>[pgaf_post_grid]</code> - Post Grid Shortcode
<code>[pgaf_post_filter]</code> - Post Filter Shortcode

= Here is shortcode parameters for Grid =

<code>[pgaf_post_grid]</code>

* **limit :** [pgaf_post_grid limit="10"] (Display latest 10 posts and then pagination).
* **cat_id :**  [pgaf_post_grid cat_id="category_id"] (Display posts categories wise).
* **include_cat_child :** [pgaf_post_grid include_cat_child="false"] (Include cat child or not. Values are "true" or "false").
* **design:** [pgaf_post_grid design="design-1"] (Select the design to display. there are 2 designs ie design-1 and design-2 ).
* **grid :** [pgaf_post_grid grid="2"](Display post in Grid formats).
* **order :**  [pgaf_post_grid order="DESC"] (Post order ie DESC or ASC).
* **orderby:** [pgaf_post_grid orderby="date"] (Order by post ie ID, author, title, date, name, rand etc).
* **image_fit :** [pgaf_post_grid image_fit="true"] (Fit the post image in wrap. Values are "true" or "false").
* **media_size :**  [pgaf_post_grid media_size="large"] (Set the featured image size to diplay in post Values are thumbnail, medium, large, full).
* **image_height :**  [pgaf_post_grid image_height="300"] (Set featured image height).
* **show_date :** [pgaf_post_grid show_date="false"] (Display post date OR not. By default value is "true". Options are "ture OR false")
* **show_author :** [pgaf_post_grid show_author="true"] (Display post author. Values are "true" or "false").
* **show_content :** [pgaf_post_grid show_content="true" ] (Display post Short content OR not. By default value is "true". Options are "ture OR false").
* **show_read_more :** [pgaf_post_grid show_read_more="true"] (Display Read more button or not. Options are "ture OR false")
* **show_category_name :** [pgaf_post_grid show_category_name="true" ] (Display post category name OR not. By default value is "True". Options are "ture OR false").
* **content_words_limit :** [pgaf_post_grid content_words_limit="30" ] (Control post short content Words limt. By default limit is 20 words).
* **content_tail :** [pgaf_post_grid content_tail=".." ] (Set content tail).
* **pagination :** [pgaf_post_grid pagination="true" ] (Set content tail).
* **pagination_type :** [pgaf_post_grid pagination_type="numeric" ] (values are "prev-next" and "numeric").
* **show_comments :** [pgaf_post_grid show_comments="true" ] (Options are "ture OR false").

= Here is shortcode parameters for grid filter =

<code>[pgaf_post_filter]</code>

* **cat_id :**  [pgaf_post_filter cat_id="category_id"] (Display posts categories wise).
* **include_cat_child :** [pgaf_post_filter include_cat_child="false"] (Include cat child or not. Values are "true" or "false").
* **design:** [pgaf_post_filter design="design-1"] (Select the design to display. there are 2 designs ie design-1 and design-2 ).
* **grid :** [pgaf_post_filter grid="2"](Display post in Grid formats).
* **order :**  [pgaf_post_filter order="DESC"] (Post order ie DESC or ASC).
* **orderby:** [pgaf_post_filter orderby="date"] (Order by post ie ID, author, title, date, name, rand etc).
* **image_fit :** [pgaf_post_filter image_fit="true"] (Fit the post image in wrap. Values are "true" or "false").
* **media_size :**  [pgaf_post_filter media_size="large"] (Set the featured image size to diplay in post Values are thumbnail, medium, large, full).
* **image_height :**  [pgaf_post_filter image_height="300"] (Set featured image height).
* **show_date :** [pgaf_post_filter show_date="false"] (Display post date OR not. By default value is "true". Options are "ture OR false")
* **show_author :** [pgaf_post_filter show_author="true"] (Display post author. Values are "true" or "false").
* **show_content :** [pgaf_post_filter show_content="true" ] (Display post Short content OR not. By default value is "true". Options are "ture OR false").
* **show_read_more :** [pgaf_post_filter show_read_more="true"] (Display Read more button or not. Options are "ture OR false")
* **show_category_name :** [pgaf_post_filter show_category_name="true" ] (Display post category name OR not. By default value is "True". Options are "ture OR false").
* **content_words_limit :** [pgaf_post_filter content_words_limit="30" ] (Control post short content Words limt. By default limit is 20 words).
* **content_tail :** [pgaf_post_filter content_tail=".." ] (Set content tail).
* **show_comments :** [pgaf_post_filter show_comments="true" ] (Options are "ture OR false").
* **cat_orderby :** [pgaf_post_filter cat_orderby="name" ]
* **all_filter_text :** [pgaf_post_filter all_filter_text="All" ]

= Template code is =
<code><?php echo do_shortcode('[pgaf_post_grid]'); ?></code>
<code><?php echo do_shortcode('[pgaf_post_filter]'); ?></code>

== Installation ==

1. Upload the 'post-grid-and-filter-ultimate' folder to the '/wp-content/plugins/' directory.
2. Activate the "Post grid and filter ultimate" list plugin through the 'Plugins' menu in WordPress.
3. Add a new page and add shortcode.

== Screenshots ==

1. Post grid view.
2. Post grid filter view.

== Changelog ==

= 1.4 (28, jan 2021) =
* [+] New - Added native shortcode support for Elementor, SiteOrigin and Beaver builder.
* [+] New - Added Divi page builder native support.
* [+] New - Added Fusion page builder native support.
* [*] Tweak - Code optimization and performance improvements.

= 1.3 (29, Oct 2020) =
* [*] Update - Regular plugin maintenance. Updated readme file.
* [+] New - Click to copy the shortcode.
* [+] Added - Added our other Popular Plugins under Post Grid And Filter --> Install Popular Plugins From WPOS. This will help you to save your time during creating a website.
* [*] Tested up to latest version of WordPress.

= 1.2 (27, August 2020) =
* [+] New - Added Gutenberg block support. Now use plugin easily with Gutenberg!
* [+] New - Added 'align' and 'extra_class' parameter for slider shortcode. Now both slider shortcode are support twenty-ninteent and twenty-twenty theme gutenberg block align and additional class feature.
* [+] New - Add new JavaScript Filterize method for post filter shortcode.
* [*] Tweak - Code optimization and performance improvements.
* [*] Template File - Main design file has been updated. If you have override template file then verify with latest copy.

= 1.1.5 (14, July 2020) =
* [*] Follow WordPress Detailed Plugin Guidelines for Offload Media and Analytics Code.

= 1.1.4 (31, Dec 2019) =
* [*] Replaced wp_reset_query() with wp_reset_postdata() in both shortcodes.
* [*] Fixed image (icon) shadow issue.
* [-] Removed hire us tab from Post Grid And Filter menu.

= 1.1.3 (07, March 2019) =
* [*] Added Opt-in functionality.

= 1.1.2 (10-7-2017) =
* Fixed pagination issue

= 1.1.1 (10-7-2017) =
* Fixed missing variable issue
* Fixed some undefined function issue

= 1.1 (3-7-2017) =
* Fixed post filter issue
* Added how it work section

= 1.0 =
* Initial release.