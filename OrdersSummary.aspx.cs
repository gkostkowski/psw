using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class OrdersSummary : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["total_cost"] != null)
        {
            Info.Text = "Twoje zamówienie zostało złozone. Koszt zamowenia to " + Session["total_cost"];
            Session["total_cost"] = null;
        }
        else
        {
            Info.Text = "Brak uprawnień";
        }
    }
}