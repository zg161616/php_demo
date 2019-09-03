var UI= {
    alert: function (obj) {
        var title, msg, icon;
        title = (obj == undefined || obj.title == undefined) ? '系统消息' : obj.title;
        msg = (obj == undefined || obj.msg == undefined) ? '' : obj.msg;
        icon = (obj == undefined || obj.icon == undefined) ? 'warn' : obj.icon;
        var html = '<div class="modal fade" tabindex="-1" role="dialog" id="myModal_sm">\n' +
            '    <div class="modal-dialog modal-sm" role="document">\n' +
            '        <div class="modal-content">\n' +
            '            <div class="modal-header">\n' +
            '                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n' +
            '                <h4 class="modal-title">' + title + '</h4>\n' +
            '            </div>\n' +
            '            <div class="modal-body">\n' +
            '                <p><img src="./static/img/' + icon + '.jpg" style="height: 32px;width: 32px">' + msg + '</p>\n' +
            '            </div>\n' +
            '            <div class="modal-footer">\n' +
            '                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$(\'myModal\').modal(\'hide\');">Close</button>\n' +
            '                <button type="button" class="btn btn-primary">Save changes</button>\n' +
            '            </div>\n' +
            '        </div><!-- /.modal-content -->\n' +
            '    </div><!-- /.modal-dialog -->\n' +
            '</div><!-- /.modal -->'
        $('body').append(html);
        $('#myModal_sm').modal({backdrop: "static"})
        $('#myModal_sm').modal("show")
        $('#myModal_sm').on('hide.bs.modal', function () {
            $('#myModal_sm').remove();
        })
    },
    open:function (obj) {
        title = (obj == undefined || obj.title == undefined) ? '系统消息' : obj.title;
        url = (obj == undefined || obj.url == undefined) ? '' : obj.url;
        width = (obj == undefined || obj.width == undefined) ? 350: obj.width;
        height = (obj == undefined || obj.height == undefined) ? 300 : obj.height;

        var html='<div class="modal fade" tabindex="-1" role="dialog" id="myModal_lg">\n' +
            '    <div class="modal-dialog modal-lg" role="document">\n' +
            '        <div class="modal-content">\n' +
            '            <div class="modal-header">\n' +
            '                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n' +
            '                <h4 class="modal-title">'+title+'</h4>\n' +
            '            </div>\n' +
            '            <div class="modal-body">\n' +
            '<iframe src="'+url+'" style="height: 100%;width: 100%;"frameborder="0"></iframe>'
        '            </div>\n' +
            '            <div class="modal-footer">\n' +
            '            </div>\n' +
            '        </div><!-- /.modal-content -->\n' +
            '    </div><!-- /.modal-dialog -->\n' +
            '</div><!-- /.modal -->';
        $('body').append(html);
        $('#myModal_lg .modal-lg').css('width',width)
        $('#myModal_lg .modal-body').css('height',height)
        $('#myModal_lg').modal({backdrop: "static"})
        $('#myModal_lg').modal("show")
        $('#myModal_lg').on('hide.bs.modal', function () {
            $('#myModal_lg').remove();
        })
    }
}
