using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class BasketPage : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        Dictionary<int, Tuple<string, double>> basket = Basket.GetBasket();
        
        for (int i = 0; i < basket.Count; i++ )
        {
            ListItem li = new ListItem();
            //li.Attributes.Add(basket[i].Item1, basket[i].Item2+"");
            li.Text = basket[i].Item1 + ", " + basket[i].Item2 + " PLN";
            BasketContent.Items.Add(li);
        }
        
    }

    protected void Czysc(object sender, EventArgs e)
    {
        Basket.Clear();
    }
}