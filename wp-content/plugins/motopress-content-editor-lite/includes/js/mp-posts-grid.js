(function ($) {
    $(function () {
        var FILTER_ACTIVE_STYLE_CLASS = 'ui-state-active';
        var FILTER_REAL_ACTIVE_CLASS = 'motopress-active-filter';
        var postsGrids = $('.motopress-posts-grid-obj');

        function getActiveFilters(postsGrid) {
            var filters,
                filtersWrapper = postsGrid.children('.motopress-filter'),
                activeFilters = filtersWrapper.find('.' + FILTER_REAL_ACTIVE_CLASS);

                    if (activeFilters.length) {
                filters = {};
                activeFilters.each(function () {
                    var tax = $(this).closest('.motopress-filter-group').attr('data-group');
                    var term = $(this).attr('data-filter');
                    filters[tax] = term !== '' ? [term] : [];
                });
            } else {
                filters = false;
            }

                        return filters;
        }

                function filterPosts(postsGrid, filters) {            
            var shortcodeAttrs = postsGrid.attr('data-shortcode-attrs');
            var postID = postsGrid.attr('data-post-id');
            $.post(MPCEPostsGrid.admin_ajax,
                {
                    'action': 'motopress_ce_posts_grid_filter',
                    'nonce': MPCEPostsGrid.nonces.motopress_ce_posts_grid_filter,
                    'shortcode_attrs': shortcodeAttrs,
                    'filters': filters,
                    'post_id' : postID,
                    'page_has_presets' : $('#motopress-ce-presets-styles').length !== 0
                },
                function (response) {
                    if (response.success) {
                        var items = $(response.data.items),
                            loadMoreButton = $(response.data.load_more),
                            pagination = $(response.data.pagination);

                                            postsGrid.children(':not(.motopress-filter)').remove()
                                .end().append(items, loadMoreButton, pagination);

                        if ( response.hasOwnProperty('custom_styles') ) {
                            updateCustomStyles(response.custom_styles);
                        }  
                    }
                }
            );
        }

        function loadMorePosts(postsGrid, page, filters){
            var shortcodeAttrs = postsGrid.attr('data-shortcode-attrs');
            var postID = postsGrid.attr('data-post-id');
            $.post(MPCEPostsGrid.admin_ajax,
                {
                    'action': 'motopress_ce_posts_grid_load_more',
                    'nonce': MPCEPostsGrid.nonces.motopress_ce_posts_grid_load_more,
                    'shortcode_attrs': shortcodeAttrs,
                    'filters': filters,
                    'page' : page,
                    'post_id' : postID,
                    'page_has_presets' : $('#motopress-ce-presets-styles').length !== 0
                },
                function (response) {
                    if (response.success) {
                        var itemsWrapper = postsGrid.children('.motopress-paged-content'),
                            itemsColumns = parseInt(itemsWrapper.attr('data-columns')),
                            items = response.data.items,
                            loadMoreButton = $(response.data.load_more);
                        postsGrid.children(':not(.motopress-filter, .motopress-paged-content)').remove();                        

                        var lastRow = itemsWrapper.children('.motopress-filter-row:last');
                        for ( var i = lastRow.children('.motopress-filter-col').length; i < itemsColumns; i++) {
                            if (items.length) {
                                lastRow.append(items.shift());
                            }
                        }

                        var rowPrototype = lastRow.clone().empty();
                        $.each(items, function(index, el){
                            rowPrototype.append($(el));                            
                            if ((index + 1) % itemsColumns === 0 || items.length === index + 1) {
                                itemsWrapper.append(rowPrototype.clone()); 
                                rowPrototype.empty();
                            }
                        });

                        if ( response.hasOwnProperty('custom_styles') ) {
                            updateCustomStyles(response.custom_styles);
                        }                        

                        itemsWrapper.after(loadMoreButton);
                    }
                }
            );
        }

        function updateCustomStyles(customStyles){
            var privateStyleTag = $('#motopress-ce-private-styles');
            if (customStyles.hasOwnProperty('private')) {                
                var postsPrintedStyles = privateStyleTag.attr('data-posts') !== '' ? privateStyleTag.attr('data-posts').split(',') : [];

                                $.each(postsPrintedStyles, function(postId){
                    delete customStyles.private[postId];
                });

                var privateStyles = privateStyleTag.text();
                $.each(customStyles.private, function(postId, style){
                    privateStyles += style;
                    postsPrintedStyles.push(postId);
                });

                privateStyleTag.text(privateStyles);
                privateStyleTag.attr('data-posts', postsPrintedStyles.join(','));
            }

            if (customStyles.hasOwnProperty('presets') && !$('#motopress-ce-presets-styles').length) {
                privateStyleTag.before(customStyles.presets);
            }
        }

        function turnPage(postsGrid, page, filters){
            var shortcodeAttrs = postsGrid.attr('data-shortcode-attrs');
            var postID = postsGrid.attr('data-post-id');
            $.post(MPCEPostsGrid.admin_ajax,
                {
                    'action': 'motopress_ce_posts_grid_turn_page',
                    'nonce': MPCEPostsGrid.nonces.motopress_ce_posts_grid_turn_page,
                    'shortcode_attrs': shortcodeAttrs,
                    'filters': filters,
                    'page' : page,
                    'post_id' : postID,
                    'page_has_presets' : $('#motopress-ce-presets-styles').length !== 0
                },
                function (response) {
                    if (response.success) {
                        var items = $(response.data.items),                            
                            pagination = $(response.data.pagination);
                        postsGrid.children(':not(.motopress-filter)').remove().end().append(items, pagination);

                                                if ( response.data.hasOwnProperty('custom_styles') ) {
                            updateCustomStyles(response.data.custom_styles);
                        }                        
                    }
                }
            );
        }

        function showPreloader(el){
            el.addClass('ui-state-loading');
        }

        function hidePreloader(postsGrid){
            postsGrid.find('.motopress-paged-content').addClass('ui-state-loading');
        }

        postsGrids.on('click', '.motopress-filter [data-filter]:not(.' + FILTER_REAL_ACTIVE_CLASS + ')', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var postsGrid = $(this).closest('.motopress-posts-grid-obj');
            var currentFilterGroup = $(this).closest('.motopress-filter-group');
            showPreloader(postsGrid.children('.motopress-paged-content'));
            currentFilterGroup.find('.' + FILTER_ACTIVE_STYLE_CLASS).removeClass(FILTER_ACTIVE_STYLE_CLASS + ' ' + FILTER_REAL_ACTIVE_CLASS);
            $(this).addClass(FILTER_ACTIVE_STYLE_CLASS + ' ' + FILTER_REAL_ACTIVE_CLASS);
            var filtersWrapper = postsGrid.find('.motopress-filter');
            var filters = getActiveFilters(postsGrid);
            filterPosts(postsGrid, filters);
        });

        postsGrids.on('click', '.motopress-posts-grid-pagination a[data-page]', function(e){
            e.preventDefault();
            e.stopPropagation();
            showPreloader($(this).parent());
            var postsGrid = $(this).closest('.motopress-posts-grid-obj');
            var page = $(this).attr('data-page');
            var filters = getActiveFilters(postsGrid)
            turnPage(postsGrid, page, filters);
        });

                postsGrids.on('click', '.motopress-load-more', function(e){
            e.preventDefault();
            e.stopPropagation();
            var postsGrid = $(this).closest('.motopress-posts-grid-obj');
            var page = $(this).attr('data-page');
            var filters = getActiveFilters(postsGrid);
            showPreloader($(this).parent());
            loadMorePosts(postsGrid, page, filters);
        });

    });
})(jQuery);