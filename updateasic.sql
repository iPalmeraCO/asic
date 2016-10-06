UPDATE wp_posts SET guid = replace(guid, 'http://localhost/asic','http://172.20.20.105');
UPDATE wp_posts SET post_content = replace(post_content, 'http://localhost/asic', 'http://172.20.20.105');
UPDATE wp_postmeta SET meta_value = replace(meta_value,'http://localhost/asic','http://172.20.20.105');
UPDATE wp_options SET option_value = 'http://172.20.20.105' WHERE option_id = 1;
UPDATE wp_options SET option_value = 'http://172.20.20.105' WHERE option_id = 2;