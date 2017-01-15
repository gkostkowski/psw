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
    <input ID="dataOd" type="date"/> <br />
    <asp:Label ID="Label6" runat="server" Text="Data do:"></asp:Label>
    <input ID="dataDo" type="date" /> <br />
    <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" ErrorMessage="RegularExpressionValidator" ControlToValidate="dataDo" ValidationExpression="\d{4}-\d{2}-\d{2}" Visible="False"></asp:RegularExpressionValidator>

    <asp:CheckBoxList ID="CBAdditional" runat="server">
        <asp:ListItem>Dodatkowe ubezpieczenie</asp:ListItem>
        <asp:ListItem>Kierowca poniżej 25 roku życia</asp:ListItem>
        <asp:ListItem>Przewóz zwierząt</asp:ListItem>
    </asp:CheckBoxList>
    <br />
    <asp:Button ID="Button1" runat="server" OnClick="Button1_Click" Text="Dodaj do koszyka" /><br />
    <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl="~/OrdersSummary.aspx">Przejdź do koszyka</asp:HyperLink>


</asp:Content>
