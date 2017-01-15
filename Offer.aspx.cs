using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Offer : System.Web.UI.Page
{
    const string c_audiA3 = "Audi A3";
    const string c_fiatPanda = "Fiat Panda";
    const string c_alfaRomeo = "Alfa Romeo";
    const string c_audiA4 = "Audi A4";
    const string c_renaultClio = "Renault Clio";
    const string c_nissanAlmera = "Nissan Almera";

    Dictionary<string, int> auta = new Dictionary<string, int>(){
        {c_audiA3, 310},
        {c_fiatPanda,320},
        {c_alfaRomeo,280},
        {c_audiA4,350},
        {c_renaultClio,240},
        {c_nissanAlmera,275}
    };

    const int MLODY_KIEROWCA = 47;
    const int ZWIERZETA = 16;
    const string RB_CONTROL = "System.Web.UI.WebControls.RadioButtonList";
    
    string[] glowna = {c_audiA4, c_renaultClio, c_fiatPanda, c_nissanAlmera};
    string[] Opole = {c_audiA3, c_fiatPanda, c_alfaRomeo};


    protected void Page_Load(object sender, EventArgs e)
    {
        ItemsAmount.Text = Basket.GetCount().ToString();
        if (IsPostBack)
        {
            if (dataDo.Text != "" && dataOd.Text != "") 
            {
                IleDni.Text = Ile_Dni(dataOd.Text, dataDo.Text).ToString();
                IleDni.Visible = true;
                IleDniLabel.Visible = true;
                if (Lkoszt.Visible)
                    ObliczCalkowityKoszt(null, null);

            }
            else
            {
                IleDni.Visible = false;
                IleDniLabel.Visible = false;
            }
        }
        if (RBWypoz.SelectedIndex == 0 && GetPostBackControl(this).ToString() == RB_CONTROL)
        {
            Lkoszt.Visible = false;
            CBElems.DataSource = glowna;
            CBElems.DataBind();                

        } else
            if (RBWypoz.SelectedIndex == 1 && GetPostBackControl(this).ToString() == RB_CONTROL)
            {
                Lkoszt.Visible = false;
                CBElems.DataSource = Opole;
                CBElems.DataBind();
            }

                
    }
    protected void Button1_Click(object sender, EventArgs e)
    {

    }

    protected double Ile_Dni(string d1, string d2) {
        d1 += " 00:00:00,000";
        d2 += " 00:00:00,000";
        DateTime dataOd = DateTime.ParseExact(d1, "yyyy-MM-dd HH:mm:ss,fff",
                                       System.Globalization.CultureInfo.InvariantCulture);
        DateTime dataDo = DateTime.ParseExact(d2, "yyyy-MM-dd HH:mm:ss,fff",
                                       System.Globalization.CultureInfo.InvariantCulture);
        return (dataDo.Date - dataOd.Date).TotalDays;
    }

    /*Oblicza koszt dla wszystkich wybranych samochodow*/
    protected void ObliczCalkowityKoszt(object sender, EventArgs e)
    {
        string output = "Koszt wybranej oferty wynosi: ";
        double kosztCalk = 0.0;
        for (int i = 0; i < CBElems.Items.Count; i++)
        {
            
            if (CBElems.Items[i].Selected)
            {
                kosztCalk += ObliczCene(CBElems.Items[i].Text);
            }
        }

        Lkoszt.Text = output + kosztCalk + " PLN";
        Lkoszt.Visible = true;
    }

    protected void DodajDoKoszyka(object sender, EventArgs e)
    {
        for (int i = 0; i < CBElems.Items.Count; i++)
        {
            
            if (CBElems.Items[i].Selected)
            {
                string wybraneAuto = CBElems.Items[i].Text;
                double kosztJednAuta = ObliczCene(wybraneAuto);
                Basket.AddItem(wybraneAuto, kosztJednAuta);
            }
        }
        Lkoszt.Text = "Wybrane elementy zostały dodane do koszyka.";
    }
    
    /*Oblicza koszt dla jednego samochodu*/
    protected double ObliczCene(string auto)
    {
        int przedzial =0;
        Int32.TryParse(IleDni.Text, out przedzial);
        int kosztAuta = 0;
        auta.TryGetValue(auto, out kosztAuta);
        double dodatkUbezp = CBAdditional.Items[0].Selected ? dodUbezp(auto, kosztAuta) : 0;
        int mlodyKier = CBAdditional.Items[1].Selected ? MLODY_KIEROWCA : 0;
        int zwierz = CBAdditional.Items[2].Selected ? ZWIERZETA : 0;
        return przedzial*(kosztAuta+dodatkUbezp+mlodyKier+zwierz);
    }

    protected double dodUbezp(string auto, double koszt)
    {
        return 0.12 * koszt;
    }

    public static Control GetPostBackControl(Page page)
    {
        Control control = null;

        string ctrlname = page.Request.Params.Get("__EVENTTARGET");
        if (ctrlname != null && ctrlname != string.Empty)
        {
            control = page.FindControl(ctrlname);
        }
        else
        {
            foreach (string ctl in page.Request.Form)
            {
                Control c = page.FindControl(ctl);
                if (c is System.Web.UI.WebControls.Button)
                {
                    control = c;
                    break;
                }
            }
        }
        return control;
    }

}