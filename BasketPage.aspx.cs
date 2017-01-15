using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class BasketPage : System.Web.UI.Page
{
    const int DO_5_KM = 50;
    const int DO_20_KM = 300;
    const int ODBIOR_OSOBISTY = 0;
    const int PRZEDLATA = 0;
    const int PRZY_ODBIORZE = 20; 

    protected void Page_Load(object sender, EventArgs e)
    {
        Dictionary<int, Tuple<string, double>> basket = Basket.GetBasket();

        if (basket.Count == 0)
        {
            EmptyBasket.Text = "Koszyk jest pusty";
            EmptyBasket.Visible = true;
            Button1.Visible = false;
            Total.Visible = false;
            Price.Visible = true;
            //OrderBtn.Visible = false;
            ShippingMethod.Visible = false;
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
            //OrderBtn.Visible = true;
            Button1.Visible = true;
            Total.Visible = true;
            Price.Visible = true;
            double price = Basket.getTotalCount();

            if (ShippingMethod.SelectedIndex == 0)
            {
                price += ODBIOR_OSOBISTY;
            }
            else if (ShippingMethod.SelectedIndex == 1)
            {
                price += DO_5_KM;
            }
            else if (ShippingMethod.SelectedIndex == 2)
            {
                price += DO_20_KM;
            }

            if (PaymentType.SelectedIndex == 0)
            {
                price += PRZEDLATA;
            }
            else if (PaymentType.SelectedIndex == 1)
            {
                price += PRZY_ODBIORZE;
            }
            Price.Text = "Wartość koszyka: " + Convert.ToString(Basket.getTotalCount());
            Total.Text = "Do zapłaty: " + Convert.ToString(price);

        }
        
    }

    protected void Czysc(object sender, EventArgs e)
    {
        Basket.Clear();
        BasketContent.Items.Clear();
    }
}