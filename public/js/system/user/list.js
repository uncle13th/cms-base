$(function(){


    var curPage = 1;
    var perPage = 5;

    init();
    getList();

    /**
     * 初始化数据
     */
    function init(){
        $("#searchUser").on('click', function(){
            curPage = 1;
            getList();
        });
    }

    /**
     * 获取用户列表数据
     */
    function getList(){
        var id = $.trim($("#userId").val());
        var name = $.trim($("#userName").val());
        var status = $("#userStatus").val();
        var data = 'id=' + id + '&name=' + name + '&status=' + status + '&page=' + curPage + '&per_page=' + perPage;
        $.ajax({
            url: 'user/list',
            type: 'get',
            data: data,
            dataType: "json",
            timeout: 30000,
            success : function(respone){
                if(respone.code == 0){
                    displayUserList(respone.data)
                }else{
                    showErrorMsg(respone.msg)
                }
            },
            error: function(){
                showErrorMsg('系统出现异常!')
            }
        });
    }

    /**
     * 显示用户列表数据
     * @param data
     */
    function displayUserList(data){
        if($.isEmptyObject(data) || $.isEmptyObject(data.list) || data.total == 0){
            var str = '<tr><td colspan="7">没有数据!</td></tr>';
            $("#userList").html(str);
            $("#userTotal").text(0);
            $("#paginator").html('');
        }else{
            var str = '';
            $.each(data.list, function(i, item){
                str += '<tr>';
                str += '<td>' + item['id'] + '</td>';
                str += '<td>' + item['name'] + '</td>';
                str += '<td>' + item['nickname'] + '</td>';
                str += '<td>' + item['email'] + '</td>';
                str += '<td>' + item['phone'] + '</td>';
                if(item['status'] == 1){
                    str += '<td>' +
                        '<button type="button" class="btn btn-block btn-success btn-sm status" style="width: 60px;" ' +
                        'data-id="'+item['id']+'" data-status="2">可用</button></td>';
                }else{
                    str += '<td>' +
                        '<button type="button" class="btn btn-block btn-danger btn-sm status" style="width: 60px;" ' +
                        'data-id="'+item['id']+'" data-status="2">不可用</button></td>';
                }
                str += '<td><div>';
                str += '<button type="button" class="btn btn-info btn-sm edit" style="width: 50px; margin-right: 10px;"' +
                    ' data-id="'+item['id']+'">修改</button>';
                str += '<button type="button" class="btn btn-warning btn-sm delete" style="width: 50px;"' +
                    ' data-id="'+item['id']+'">删除</button>';
                str += '</div></td>';
                str += '</tr>';
            });
            $("#userList").html(str);
            $("#userTotal").text(data.total);

            // 设置分页
            var total = data.total;
            var per_page = data.per_page;
            var current_page = parseInt(data.page);
            var total_page = Math.ceil(total/per_page);
            setPage(total_page, current_page);

            // 设置事件关联
        }
    }

    /**
     * 显示错误信息
     * @param message
     */
    function showErrorMsg(message){
        alert(message);
    }

    /**
     * 设置分页信息
     * @param totalPages 总页数
     * @param currentPage 当前页码
     */
    function setPage(totalPages, currentPage){
        $('#paginator').jqPaginator({
            totalPages: totalPages,
            visiblePages: 7,
            currentPage: currentPage,
            prev: '<li class="paginate_button page-item previous"><a class="page-link" href="javascript:;">上一页</a></li>',
            next: '<li class="paginate_button page-item next"><a class="page-link" href="javascript:;">下一页</a></li>',
            page: '<li class="paginate_button page-item "><a class="page-link" href="javascript:;">{{page}}</a></li>',
            onPageChange: function (num, type) {
                if(type == 'change'){
                    curPage = num;
                    getList();
                }
            }
        });
    }

    function changeStatus(id, status){
        alert('id = '+id+' , status = ' +status);
    }

});



