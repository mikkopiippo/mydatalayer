# My dataLayer

My Data Layer is a WordPress plugin that adds a data layer to the head of each page. It is designed to make it easy to track information about the current page and user in a format that can be easily consumed by Google Tag Manager or other analytics tools.

## Installation
Upload the plugin files to the /wp-content/plugins/my-data-layer directory.

## Usage
Once the plugin is activated, it will automatically add a data layer to the head of each page on your site. The data layer will contain the following information:

- post_id: the ID of the current post or page
- post_title: the title of the current post or page
- post_author: the display name of the author of the current post or page
- post_author_id: the ID of the author of the current post or page
- post_categories: a comma-separated list of the categories that the current post is assigned to
- post_tags: a comma-separated list of the tags that the current post is assigned to
- page_type: the type of the current page (e.g. "homepage", "category", "tag", "archive", "post")
- post_published: the date that the current post was published in the format "YYYY-MM-DD"
- user_login_status: a boolean indicating whether the current user is logged in
- user_id: the ID of the current user (if they are logged in)
- You can then use this information in your analytics or marketing tags to track information about the pages and users on your site.

License
My Data Layer is licensed under the GPL-3.0. You can find a copy of the license at https://www.gnu.org/licenses/gpl-3.0.en.html.
