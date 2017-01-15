<%@ Page Title="Oferta" Language="C#" AutoEventWireup="true" MasterPageFile="~/Site.Master" CodeFile="Offer.aspx.cs" Inherits="Offer" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <br />
    <b><asp:Label ID="Label1" runat="server" Text="Aktualnie w koszyku: "></asp:Label>
    <asp:Label ID="ItemsAmount" runat="server" Text="0"></asp:Label></b><br />
    <br />
    <asp:Label ID="Label2" runat="server" Text="Wypożyczalnie"></asp:Label>
    <asp:RadioButtonList ID="RBWypoz" runat="server" AutoPostBack="True">
        <asp:ListItem>Wypożyczalnia główna</asp:ListItem>
        <asp:ListItem>Wypożyczalnia w Opolu</asp:ListItem>
    </asp:RadioButtonList>
    <br />
    <asp:Label ID="Label3" runat="server" Text="Dostępne samochody:"></asp:Label>
    <asp:CheckBoxList ID="CBElems" runat="server" Visible="True">
    </asp:CheckBoxList>
    <br />

    <asp:Label ID="Label5" runat="server" Text="Informacje dodatkowe"></asp:Label><br />
    <asp:Label ID="Label4" runat="server" Text="Data od:"></asp:Label>
    <asp:TextBox ID="dataOd" type="date" runat="server"></asp:TextBox> <br /> <br />
    <asp:CompareValidator
    id="dateValidator" runat="server" 
    Type="Date"
    ForeColor="Red"
    Operator="DataTypeCheck"
    ControlToValidate="dataOd" 
    ErrorMessage="Podana data jest niepoprawna."
    >
</asp:CompareValidator> <br />
    <asp:Label ID="Label6" runat="server" Text="Data do:"></asp:Label>
    <asp:TextBox ID="dataDo" type="date" runat="server" AutoPostBack="False"></asp:TextBox> <br />
    <asp:CompareValidator
    id="CompareValidator3" runat="server" 
    Type="Date"
        ForeColor="Red"
    Operator="DataTypeCheck"
    ControlToValidate="dataDo" 
    ErrorMessage="Podana data jest niepoprawna.">
</asp:CompareValidator> <br />
    <i><asp:Label ID="IleDniLabel" runat="server" Text="liczba dni: " Visible="false"></asp:Label>
    <asp:Label ID="IleDni" runat="server" Text="liczba dni: " Visible="false"></asp:Label></i>

    <asp:CheckBoxList ID="CBAdditional" runat="server">
        <asp:ListItem>Dodatkowe ubezpieczenie</asp:ListItem>
        <asp:ListItem>Kierowca poniżej 25 roku życia</asp:ListItem>
        <asp:ListItem>Przewóz zwierząt</asp:ListItem>
    </asp:CheckBoxList>
    <br />
    <asp:Button ID="Button2" runat="server" OnClick="ObliczCalkowityKoszt" Text="Oblicz cenę" AutoPostBack="True"/><br />
    <b><asp:Label ID="Lkoszt" runat="server" Text="Koszt wybranej oferty: " Visible="false"></asp:Label></b> <br />
    <asp:Button ID="Submit" runat="server" OnClick="DodajDoKoszyka" Text="Dodaj do koszyka" AutoPostBack="True"/><br />
    <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl="~/BasketPage.aspx">Przejdź do koszyka</asp:HyperLink>
    <br /><asp:Label ID="debug1" runat="server" Text=""></asp:Label><br />
    <asp:Label ID="debug2" runat="server" Text=""></asp:Label>

</asp:Content>
