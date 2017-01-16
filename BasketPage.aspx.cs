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
            SetPropertiesForEmptyBasket();
            SetLocationPropertiesVisibilties(false);
            Label2.Visible = false;
            Submit.Visible = false;
        }
        else
        {
            if (ShippingMethod.SelectedIndex == 0 || ShippingMethod.SelectedIndex < 0) 
            {
                SetLocationPropertiesVisibilties(false);
            }
            else
            {
                SetLocationPropertiesVisibilties(true);
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

            price += GetCharges();
            price += getExtraPaymanet(); 
            Price.Text = "Wartość koszyka: " + Convert.ToString(Basket.getTotalCount()) + " PLN";
            Total.Text = "Do zapłaty: " + Convert.ToString(price) + " PLN";

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
        Basket.Clear();
        Session["total_cost"] = Total.Text;
        Response.Redirect(Page.ResolveClientUrl("/OrdersSummary"));
        
    }

    private void SetPropertiesForEmptyBasket()
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
        
    }

    private void SetLocationPropertiesVisibilties(bool b)
    {
        StreetLabel.Visible = b;
        Street.Visible = b;
        CityLabel.Visible = b;
        City.Visible = b;
        NumberLabel.Visible = b;
        Number.Visible = b;
        RequiredFieldValidator1.Enabled = b;
        RequiredFieldValidator2.Enabled = b;
        RequiredFieldValidator3.Enabled = b;
        RegularExpressionValidator1.Enabled = b;
    }

    private double GetCharges()
    {
        if (ShippingMethod.SelectedIndex == 0)
        {
            return ODBIOR_OSOBISTY;
        }
        else if (ShippingMethod.SelectedIndex == 1)
        {
            return DO_5_KM;
        }
        else if (ShippingMethod.SelectedIndex == 2)
        {
            return DO_20_KM;
        }
        return 0;
    }

    private double getExtraPaymanet()
    {

        if (PaymentType.SelectedIndex == 0)
        {
            return PRZEDLATA;
        }
        else if (PaymentType.SelectedIndex == 1)
        {
            return PRZY_ODBIORZE;
        }
        return 0;

    }
}