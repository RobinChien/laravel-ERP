/**
 * jQuery littleTree
 *
 * @version  0.1
 * @author   Mikahil Matyunin <free.all.bums@gmail.com>
 */

/**
 * <ul id="tree">
 *   <li><label><input type="checkbox" />Item1</label></li>
 *   <li>
 *     <label><input type="checkbox" />ItemWithSubitems</label>
 *     <ul>
 *       <li><label><input type="checkbox" />Subitem1</label></li>
 *     </ul>
 *   </li>
 * </ul>
 *
 * Usage:
 *
 * $('ul#tree').checktree();
 *
 */

(function($){
    $.fn.extend({

        checktree: function(){
            $(this)
                .addClass('checktree-root')
                .on('change', 'input[type="checkbox"]', function(e){
                    e.stopPropagation();
                    e.preventDefault();

                    checkParents($(this));
                    checkChildren($(this));
                })
            ;

            var checkParents = function (c)
            {
                var parentLi = c.parents('ul:eq(0)').parents('li:eq(0)');

                if (parentLi.length)
                {
                    var siblingsChecked = parseInt($('input[type="checkbox"]:checked', c.parents('ul:eq(0)')).length),
                        rootCheckbox = parentLi.find('input[type="checkbox"]:eq(0)')
                    ;

                    if (c.is(':checked'))
                        rootCheckbox.prop('checked', true)
                    else if (siblingsChecked === 0)
                        rootCheckbox.prop('checked', false);

                    checkParents(rootCheckbox);
                }
            }

            var checkChildren = function (c)
            {
                var childLi = $('ul li input[type="checkbox"]', c.parents('li:eq(0)'));

                if (childLi.length)
                    childLi.prop('checked', c.is(':checked'));
            }
        }

    });
})(jQuery);
