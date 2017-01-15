<%@ Page Language="C#" AutoEventWireup="true" CodeFile="BasketPage.aspx.cs" MasterPageFile="~/Site.Master" Inherits="BasketPage" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
        
        <asp:BulletedList ID="BasketContent" runat="server"></asp:BulletedList>
        <asp:Button ID="Button1" runat="server" OnClick="Czysc" Text="Usuń wszystkie" AutoPostBack="True"/><br />
        <b><asp:Label ID="EmptyBasket" runat="server" Visible="false"></asp:Label></b> <br />

        <b><asp:Label ID="Total" runat="server" Text="Wartość koszyka: " Visible="true"></asp:Label></b> <br />
        
        <asp:HyperLink ID="OrderBtn" runat="server" NavigateUrl="~/OrdersSummary.aspx" Visible="False">Złóż zamówienie</asp:HyperLink>

        <br />
        <asp:RadioButtonList ID="ShippingMethod" runat="server" AutoPostBack="True">
            <asp:ListItem>Odbiór osobisty</asp:ListItem>
            <asp:ListItem>Kurier</asp:ListItem>
            <asp:ListItem>Poczta</asp:ListItem>
        </asp:RadioButtonList>
</asp:Content>