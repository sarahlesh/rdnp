(function() {
    //------------------- Portfolio -------------------------------------------------------------------  
    tinymce.create('tinymce.plugins.portfolio', {
        init : function(ed, url) {
          
          ed.addCommand('mcethemedelta', function() {
                ed.windowManager.open({
                    // call content via admin-ajax, no need to know the full plugin path
                    file: ajaxurl + '?action=nonprofit_tinymce&shortcode=portfolio',
                    width: 500 + ed.getLang('wd-shortcode.delta_width', 0),
                    height: 210 + ed.getLang('wd-shortcode.delta_height', 0),
                    inline: 1
                }, {
                    plugin_url: url // Plugin absolute URL
                });
            });

            // Register example button
            ed.addButton('wd-shortcode', {
                title: 'Add Portfolio',
                cmd: 'mcethemedelta',
                image: url + '/icon/portfolio.png'
            });

            // Add a node change handler, selects the button in the UI when a image is selected
            ed.onNodeChange.add(function(ed, cm, n) {
                cm.setActive('wd-shortcode', n.nodeName == 'IMG');
            });
            
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('portfolio', tinymce.plugins.portfolio);
    //------------------- Blog -------------------------------------------------------------------
    tinymce.create('tinymce.plugins.nonprofit_blog', {
        init : function(ed, url) {
          ed.addButton('nonprofit_blog', {
              title : 'Add a Blog',
              image : url+'/icon/blog.png',
              onclick : 
                function() {
                  ed.windowManager.open({
                    // call content via admin-ajax, no need to know the full plugin path
                    file: ajaxurl + '?action=nonprofit_tinymce&shortcode=nonprofit_blog',
                    width: 500 + ed.getLang('wd-shortcode.delta_width', 0),
                    height: 500 + ed.getLang('wd-shortcode.delta_height', 0),
                    inline: 1
                }, {
                    plugin_url: url // Plugin absolute URL
                });
              }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('nonprofit_blog', tinymce.plugins.nonprofit_blog);
    //------------------- maps -------------------------------------------------------------------
    tinymce.create('tinymce.plugins.nonprofit_google_map', {
        init : function(ed, url) {
          ed.addButton('nonprofit_google_map', {
              title : 'Add a Map',
              image : url+'/map.png',
              onclick : 
                function() {
                  ed.windowManager.open({
                    // call content via admin-ajax, no need to know the full plugin path
                    file: ajaxurl + '?action=nonprofit_tinymce&shortcode=nonprofit_google_map',
                    width: 500 + ed.getLang('wd-shortcode.delta_width', 0),
                    height: 500 + ed.getLang('wd-shortcode.delta_height', 0),
                    inline: 1
                }, {
                    plugin_url: url // Plugin absolute URL
                });
              }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('nonprofit_google_map', tinymce.plugins.nonprofit_google_map);
      //------------------- team -------------------------------------------------------------------
    tinymce.create('tinymce.plugins.nonprofit_team', {
        init : function(ed, url) {
          ed.addButton('nonprofit_team', {
              title : 'Add Team List',
              image : url+'/icon/team.png',
              onclick : 
                function() {
                  ed.windowManager.open({
                    // call content via admin-ajax, no need to know the full plugin path
                    file: ajaxurl + '?action=nonprofit_tinymce&shortcode=nonprofit_team',
                    width: 500 + ed.getLang('wd-shortcode.delta_width', 0),
                    height: 500 + ed.getLang('wd-shortcode.delta_height', 0),
                    inline: 1
                }, {
                    plugin_url: url // Plugin absolute URL
                });
              }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('nonprofit_team', tinymce.plugins.nonprofit_team);
      //------------------- testimonail -------------------------------------------------------------------
    tinymce.create('tinymce.plugins.nonprofit_testimonial', {
        init : function(ed, url) {
          ed.addButton('nonprofit_testimonial', {
              title : 'Add testimonial List',
              image : url+'/icon/testimonial.png',
              onclick : 
                function() {
                  ed.windowManager.open({
                    // call content via admin-ajax, no need to know the full plugin path
                    file: ajaxurl + '?action=nonprofit_tinymce&shortcode=nonprofit_testimonial',
                    width: 500 + ed.getLang('wd-shortcode.delta_width', 0),
                    height: 500 + ed.getLang('wd-shortcode.delta_height', 0),
                    inline: 1
                }, {
                    plugin_url: url // Plugin absolute URL
                });
              }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('nonprofit_testimonial', tinymce.plugins.nonprofit_testimonial);
  
    
     //------------------- Testimonial -------------------------------------------------------------------
  /*  tinymce.create('tinymce.plugins.testimonial', {
        init : function(ed, url) {
          ed.addButton('testimonial', {
              title : 'Add testimonial',
              image : url+'/icon/testimonial.png',
              onclick : 
                function() {
                  ed.selection.setContent('[nonprofit_testimonial]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('testimonial', tinymce.plugins.testimonial);
   */
    //------------------- Pricing table -------------------------------------------------------------------
    tinymce.create('tinymce.plugins.pricingtable', {
        init : function(ed, url) {
          ed.addButton('pricingtable', {
              title : 'Add a Pricing Table',
              image : url+'/icon/pricingtable.png',
              onclick : 
                function() {
                  ed.selection.setContent('<ul class="pricing-table">\
                          <li class="title">Standard</li>\
                          <li class="price">$99.99</li>\
                          <li class="description">An awesome description</li>\
                          <li class="bullet-item">1 Database</li>\
                          <li class="bullet-item">5GB Storage</li>\
                          <li class="bullet-item">20 Users</li>\
                          <li class="cta-button"><a class="button" href="#">Buy Now</a></li>\
                        </ul>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('pricingtable', tinymce.plugins.pricingtable);
    
   
    
   
    
   
  
    
      
    
})();