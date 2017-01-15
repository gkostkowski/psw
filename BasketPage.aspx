<%@ Page Language="C#" AutoEventWireup="true" CodeFile="BasketPage.aspx.cs" MasterPageFile="~/Site.Master" Inherits="BasketPage" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <asp:BulletedList ID="BasketContent" runat="server"></asp:BulletedList>
    <asp:Button ID="Button1" runat="server" OnClick="Czysc" Text="Usuń wszystkie" AutoPostBack="True"/><br />
</asp:Content>