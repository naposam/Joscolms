
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
    <!--[if IE 9]> <html class="no-js ie9 oldie" lang="en"> <![endif]-->
    <meta charset="utf-8" />
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template" />
    <title>Select Course</title>
<link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- ============ Add custom CSS here ============ -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body style="background-image: url(img/12.jpg);">
    <form id="form1" runat="server" style="margin: auto">
        <div class="container">
            <div class="row">
                <div class="Absolute-Center is-Responsive">
                    <div class="col-sm-12 col-lg-12 col-md-10">
                        <div class="registrationform">
                            <div class="form-horizontal">
                                <fieldset>
                                    <legend style="text-align: center">Course Selection</legend>
                                    <div class="form-group" style="margin-right: -40px" runat="server" id="divRole">

                                        <div class=" col-md-offset-4">
                                            <div class="input-group">
                                                <asp:DropDownList ID="dpCourse" runat="server" CssClass="form-control dropdown-menu">
                                                     <asp:ListItem>Intro To Excel</asp:ListItem>
                                                    <asp:ListItem>Advance Excel</asp:ListItem>
                                                    <asp:ListItem>Course 3</asp:ListItem>
                                                  
                                                </asp:DropDownList>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px; margin-right: -50px">
                                        <div class=" col-md-offset-4">
                                            <asp:Button ID="btnLogout" runat="server" CssClass="btn btn-warning" Text="" />
                                            <asp:Button ID="btnEnter" runat="server" CssClass="btn btn-primary" Text="Enter" />
                                            
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../dist/js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../dist/js/jquery.backstretch.js" type="text/javascript"></script>
        <script type="text/javascript">
            'use strict';

            /* ========================== */
            /* ::::::: Backstrech ::::::: */
            /* ========================== */
            // You may also attach Backstretch to a block-level element
            $.backstretch(
            [
                "img/44.jpg",
                "img/colorful.jpg",
                "img/34.jpg",
                "img/images.jpg"
            ],

            {
                duration: 4000,
                fade: 1500
            }
        );
        </script>
    </form>
</body>
</html>
