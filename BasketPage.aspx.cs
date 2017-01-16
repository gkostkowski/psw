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
            Price.Visible = false;
            Label1.Visible = false;
            PaymentType.Items[0].Attributes.CssStyle.Add("visibility", "hidden");
            PaymentType.Items[1].Attributes.CssStyle.Add("visibility", "hidden");
            ShippingMethod.Items[0].Attributes.CssStyle.Add("visibility", "hidden");
            ShippingMethod.Items[1].Attributes.CssStyle.Add("visibility", "hidden");
            ShippingMethod.Items[2].Attributes.CssStyle.Add("visibility", "hidden");
            Label2.Visible = false;
            StreetLabel.Visible = false;
            Street.Visible = false;
            CityLabel.Visible = false;
            City.Visible = false;
            NumberLabel.Visible = false;
            Number.Visible = false;
            Submit.Visible = false;
        }
        else
        {
            if (ShippingMethod.SelectedIndex == 0 || ShippingMethod.SelectedIndex < 0) 
            {
                StreetLabel.Visible = false;
                Street.Visible = false;
                CityLabel.Visible = false;
                City.Visible = false;
                NumberLabel.Visible = false;
                Number.Visible = false;
                RequiredFieldValidator1.Enabled = false;
                RequiredFieldValidator2.Enabled = false;
                RequiredFieldValidator3.Enabled = false;
                RegularExpressionValidator1.Enabled = false;
            }
            else
            {
                StreetLabel.Visible = true;
                Street.Visible = true;
                CityLabel.Visible = true;
                City.Visible = true;
                NumberLabel.Visible = true;
                Number.Visible = true;
                RequiredFieldValidator1.Enabled = true;
                RequiredFieldValidator2.Enabled = true;
                RequiredFieldValidator3.Enabled = true;
                RegularExpressionValidator1.Enabled = true;
            }

            BasketContent.Items.Clear();
            for (int i = 0; i < basket.Count; i++)
            {
                ListItem li = new ListItem();
                li.Text = basket[i].Item1 + ", " + basket[i].Item2 + " PLN";
                BasketContent.Items.Add(li);
            }
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
        Response.Redirect(Request.Url.AbsoluteUri);
    }

    protected void Order(object sender, EventArgs e)
    {
        Session["total_cost"] = Total.Text;
        Response.Redirect(Page.ResolveClientUrl("/OrdersSummary"));
    }
}