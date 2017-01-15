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

        if (basket.Count == 0)
        {
            EmptyBasket.Text = "Koszyk jest pusty";
            EmptyBasket.Visible = true;
            Button1.Visible = false;
            Total.Visible = false;
            OrderBtn.Visible = false;
        }
        else
        {
            BasketContent.Items.Clear();
            for (int i = 0; i < basket.Count; i++)
            {
                ListItem li = new ListItem();
                //li.Attributes.Add(basket[i].Item1, basket[i].Item2+"");
                li.Text = basket[i].Item1 + ", " + basket[i].Item2 + " PLN";
                BasketContent.Items.Add(li);
            }
            OrderBtn.Visible = true;
            Button1.Visible = true;
            Total.Visible = true;
        }

        Total.Text = "Wartość koszyka: " + Convert.ToString(Basket.getTotalCount());
        
    }

    protected void Czysc(object sender, EventArgs e)
    {
        Basket.Clear();
        BasketContent.Items.Clear();
    }
}