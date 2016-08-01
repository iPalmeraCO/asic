
UPDATE wp_posts SET guid = replace(guid, 'http://localhost/asic','http://159.203.108.98/asic');

UPDATE wp_posts SET post_content = replace(post_content, 'http://localhost/asic', 'http://159.203.108.98/asic');

UPDATE wp_postmeta SET meta_value = replace(meta_value,'http://localhost/asic','http://159.203.108.98/asic');