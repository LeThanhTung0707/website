<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<div class="container">
    <div style ="margin-top:-32px;"class="row animate__animated animate__fadeInDown animate__delay-1s">
        <div class="btn-group btn-breadcrumb"> <a href="." class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a> 
       
            <a href="category.php?id_post=<?php echo $data['id_post'];?> " class="btn btn-default"><?php echo substr($data['category'],0,100);?></a> 
            <?php if ($data['title'] !="") { ?>
             <a href="" class="btn btn-default"><?php echo substr($data['title'], 0, 80 ) ; ?></a>
            <?php } ?>
        </div>
    </div>
</div>
<style>
    .btn-breadcrumb .btn:not(:last-child):after {
        content: " ";
        display: block;
        width: 0;
        height: 0;
        border-top: 17px solid transparent;
        border-bottom: 17px solid transparent;
        border-left: 10px solid white;
        position: absolute;
        top: 50%;
        margin-top: -17px;
        left: 100%;
        z-index: 3;
    }

    .btn-breadcrumb .btn:not(:last-child):before {
        content: " ";
        display: block;
        width: 0;
        height: 0;
        border-top: 17px solid transparent;
        border-bottom: 17px solid transparent;
        border-left: 10px solid rgb(173, 173, 173);
        position: absolute;
        top: 50%;
        margin-top: -17px;
        margin-left: 1px;
        left: 100%;
        z-index: 3;
    }

    .btn-breadcrumb .btn {
        padding: 6px 12px 6px 24px;
    }

    .btn-breadcrumb .btn:first-child {
        padding: 6px 6px 6px 10px;
    }

    .btn-breadcrumb .btn:last-child {
        padding: 6px 18px 6px 24px;
    }


    .btn-breadcrumb .btn.btn-default:not(:last-child):after {
        border-left: 10px solid #fff;
    }

    .btn-breadcrumb .btn.btn-default:not(:last-child):before {
        border-left: 10px solid #ccc;
    }

    .btn-breadcrumb .btn.btn-default:hover:not(:last-child):after {
        border-left: 10px solid #ebebeb;
    }

    .btn-breadcrumb .btn.btn-default:hover:not(:last-child):before {
        border-left: 10px solid #adadad;
    }


    .btn-breadcrumb .btn.btn-primary:not(:last-child):after {
        border-left: 10px solid #428bca;
    }

    .btn-breadcrumb .btn.btn-primary:not(:last-child):before {
        border-left: 10px solid #357ebd;
    }

    .btn-breadcrumb .btn.btn-primary:hover:not(:last-child):after {
        border-left: 10px solid #3276b1;
    }

    .btn-breadcrumb .btn.btn-primary:hover:not(:last-child):before {
        border-left: 10px solid #285e8e;
    }

    .btn-breadcrumb .btn.btn-success:not(:last-child):after {
        border-left: 10px solid #5cb85c;
    }

    .btn-breadcrumb .btn.btn-success:not(:last-child):before {
        border-left: 10px solid #4cae4c;
    }

    .btn-breadcrumb .btn.btn-success:hover:not(:last-child):after {
        border-left: 10px solid #47a447;
    }

    .btn-breadcrumb .btn.btn-success:hover:not(:last-child):before {
        border-left: 10px solid #398439;
    }


    .btn-breadcrumb .btn.btn-danger:not(:last-child):after {
        border-left: 10px solid #d9534f;
    }

    .btn-breadcrumb .btn.btn-danger:not(:last-child):before {
        border-left: 10px solid #d43f3a;
    }

    .btn-breadcrumb .btn.btn-danger:hover:not(:last-child):after {
        border-left: 10px solid #d2322d;
    }

    .btn-breadcrumb .btn.btn-danger:hover:not(:last-child):before {
        border-left: 10px solid #ac2925;
    }


    .btn-breadcrumb .btn.btn-warning:not(:last-child):after {
        border-left: 10px solid #f0ad4e;
    }

    .btn-breadcrumb .btn.btn-warning:not(:last-child):before {
        border-left: 10px solid #eea236;
    }

    .btn-breadcrumb .btn.btn-warning:hover:not(:last-child):after {
        border-left: 10px solid #ed9c28;
    }

    .btn-breadcrumb .btn.btn-warning:hover:not(:last-child):before {
        border-left: 10px solid #d58512;
    }

    .btn-breadcrumb .btn.btn-info:not(:last-child):after {
        border-left: 10px solid #5bc0de;
    }

    .btn-breadcrumb .btn.btn-info:not(:last-child):before {
        border-left: 10px solid #46b8da;
    }

    .btn-breadcrumb .btn.btn-info:hover:not(:last-child):after {
        border-left: 10px solid #39b3d7;
    }

    .btn-breadcrumb .btn.btn-info:hover:not(:last-child):before {
        border-left: 10px solid #269abc;
    }
</style>