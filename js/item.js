function htmlEncode(value){
  return $('<div/>').text(value).html();
}
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
}

var Item = Backbone.Model.extend({
    urlRoot: '/api/index.php/api/item',
    parse: function(data){
        if(null != data){
            return data[0];
        }
    }
});

var Items = Backbone.Collection.extend({
    url: '/api/index.php/api/item'
});

// View for Item List
var ItemListView = Backbone.View.extend({
    el: '.page',
    render: function () {
        var that = this;
        var items = new Items();
        items.fetch({
            success: function (items) {
                var template = _.template($('#item-list-template').html(), {items: items.models});
                that.$el.html(template);
            },
            error: function (){
                that.$el.html( ' Error when fetching collection. ');
            }
        })
    }
});

// Initialize a new Item List View to be rendered
var itemListView = new ItemListView();

// View for Edit List
var EditItemView = Backbone.View.extend({
    el: '.page',
        events: {
            'submit .edit-item-form': 'saveItem',
            'click .delete': 'deleteItem'
    },
    saveItem: function (ev) {
        var itemDetails = $(ev.currentTarget).serializeObject();
        var item = new Item();
        item.save(itemDetails, {
            success: function (item) {
                router.navigate('', {trigger:true});
            }
        });
        return false;
    },
    deleteItem: function (ev) {
        this.item.destroy({
            success: function () {
                router.navigate('', {trigger:true});
            }
        })
    },
    render: function (options) {
        var that = this;
        if(options.id) {
            that.item = new Item({id: options.id});
            that.item.fetch({
                success: function (item) {
                    var template = _.template($('#edit-item-template').html(), {item: item});
                    that.$el.html(template);
                }
            })
        } else {
            var template = _.template($('#edit-item-template').html(), {item: null});
            that.$el.html(template);
        }
    }
});

// Initialize a new Edit List View to be rendered
var editItemView = new EditItemView();

// Routes!!!
var Router = Backbone.Router.extend({
    routes: {
      "": "home", 
      "edit/:id": "edit",
      "new": "edit"
    }
});

// Initialize a new Router
var router = new Router;

// listening for home event 
router.on('route:home', function() {
    // render item list
    itemListView.render();
})
// listening for edit event 
router.on('route:edit', function(id) {
    editItemView.render({id: id})
})

Backbone.history.start();