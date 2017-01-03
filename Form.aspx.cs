using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Form : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        Info.Visible = IsPostBack;
        if (IsPostBack)
        {
            Info.Text =  Request.Form[3] + "<br>";
            Info.Text += Request.Form[4] + "<br>";
            Info.Text += Request.Form[5] + "<br>";
            Info.Text += Request.Form[7] + "<br>";
            
        }
    }
}
