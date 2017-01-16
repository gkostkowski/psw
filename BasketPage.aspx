<%@ Page Language="C#" AutoEventWireup="true" CodeFile="BasketPage.aspx.cs" MasterPageFile="~/Site.Master" Inherits="BasketPage" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
        
        <fieldset>
        <asp:BulletedList ID="BasketContent" runat="server"></asp:BulletedList>
        <asp:Button ID="Button1" runat="server" OnClick="Czysc" Text="Usuń wszystkie" AutoPostBack="True"/><br />
        <b><asp:Label ID="EmptyBasket" runat="server" Visible="false"></asp:Label></b> <br />

        <br />
        <b><asp:Label ID="Label2" runat="server" Text="Forma odbioru: " Visible="true"></asp:Label></b> <br />
        <asp:RadioButtonList ID="ShippingMethod" runat="server" AutoPostBack="True">
            <asp:ListItem>Odbiór w wypozyczalni</asp:ListItem>
            <asp:ListItem>Odbiór od kierowcy w zasięgu do 5 km od wypozyczalni</asp:ListItem>
            <asp:ListItem>Obiór od kierowcy w zasiegu do 20 km od wypożyczalni</asp:ListItem>
        </asp:RadioButtonList>

        <b><asp:Label ID="Label1" runat="server" Text="Rodzaj płatności: " Visible="true"></asp:Label></b> <br />
        <asp:RadioButtonList ID="PaymentType" runat="server" AutoPostBack="True">
            <asp:ListItem>Przedpłata</asp:ListItem>
            <asp:ListItem>Płatność przy odbiorze</asp:ListItem>
        </asp:RadioButtonList>

        <asp:Label ID="CityLabel" runat="server" AssociatedControlID="City">Miejscowość</asp:Label><br />
        <asp:TextBox runat="server" ID="City" /><br />
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" ControlToValidate="City" ErrorMessage="miejscowość jest wymagana." ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator><br />

    
        <asp:Label ID="StreetLabel" runat="server" AssociatedControlID="Street">Ulica</asp:Label><br />
        <asp:TextBox runat="server" ID="Street" /><br />
        <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" ControlToValidate="Street" ErrorMessage="Ulica jest wymagana." ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator><br />
    
        <asp:Label ID="NumberLabel" runat="server" AssociatedControlID="Number">Numer</asp:Label><br />
        <asp:TextBox runat="server" ID="Number" /><br />
        <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" ControlToValidate="Number" ErrorMessage="numer jest wymagany." ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator><br />
        <asp:RegularExpressionValidator ID="RegularExpressionValidator1" ControlToValidate="Number" runat="server" ErrorMessage="Wymagana jest liczba" ValidationExpression="\d+"></asp:RegularExpressionValidator><br />
        
        <br />
        <b><asp:Label ID="Price" runat="server" Text="Wartość koszyka: " Visible="true"></asp:Label></b> <br />
        <b><asp:Label ID="Total" runat="server" Text="Wartość koszyka: " Visible="true"></asp:Label></b> <br />
        
        <asp:Button ID="Submit" runat="server" OnClick="Order" Text="Złóż"/><br />
        </fieldset>
</asp:Content>