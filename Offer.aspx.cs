using System;
using System.Collections;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Offer : System.Web.UI.Page
{
    /*Hashtable glowna = new Hashtable 
    {
        {0, "A"},
        {1, "B"}
    };
    Hashtable Opole = new Hashtable 
    {
        {0, "a"},
        {1, "b"}
    };*/
    string[] glowna = { "Audi A4", "Renault Clio", "Fiat Panda", "Nissan Almera" };
    string[] Opole = { "Audi A3", "Fiat Panda", "Alfa Romeo" };


    protected void Page_Load(object sender, EventArgs e)
    {
            if (RBWypoz.SelectedIndex == 0)
            {
                CBElems.DataSource = glowna;
                CBElems.DataBind();                

            } else
                if (RBWypoz.SelectedIndex == 1)
                {
                    CBElems.DataSource = Opole;
                    CBElems.DataBind();
                }

                
    }
    protected void Button1_Click(object sender, EventArgs e)
    {

    }

}