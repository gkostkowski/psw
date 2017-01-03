<%@ Page Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeFile="Form.aspx.cs" Inherits="Form" %>


<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    
    <fieldset>
        <ol>
            <li>
                <asp:Label ID="Label1" runat="server" AssociatedControlID="Name">Imię</asp:Label><br />
                <asp:TextBox runat="server" ID="Name" /><br />
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" ControlToValidate="Name" ErrorMessage="Imię jest wymagane." ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator>
                
            </li>
            <li>
                <asp:Label ID="Label5" runat="server" AssociatedControlID="Surname">Nazwisko</asp:Label><br />
                <asp:TextBox runat="server" ID="Surname" /><br />
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" ControlToValidate="Surname" ErrorMessage="Nazwisko jest wymagane."  ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator>
            </li>
            <li>
                <asp:Label ID="Label2" runat="server" AssociatedControlID="Email">Adres e-mail</asp:Label><br />
                <asp:TextBox runat="server" ID="Email" /><br />
                <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" ControlToValidate="Email" ErrorMessage="Adres e-mail jest wymagany."  ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="emailRegularExpressionValidator" runat="server" ControlToValidate="Email" ErrorMessage="Wpisz poprawny adres email xxx@xxx.com" ForeColor="Red" ValidationExpression="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$"  Display="Dynamic"></asp:RegularExpressionValidator>
            </li>
            <li>
                <asp:Label ID="Label3" runat="server" AssociatedControlID="Email">Powtórz adres e-mail</asp:Label><br />
                <asp:TextBox runat="server" ID="ConfirmEmail" /><br />
                <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" ControlToValidate="ConfirmEmail" ErrorMessage="Należy powtórzyc adres e-mail."  ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" ControlToValidate="ConfirmEmail" ErrorMessage="Wpisz poprawny adres email xxx@xxx.com" ForeColor="Red" ValidationExpression="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$" Display="Dynamic"></asp:RegularExpressionValidator>
                <asp:CompareValidator ID="CompareValidator1" runat="server" ControlToCompare="Email" ControlToValidate="ConfirmEmail" Display="Dynamic" ForeColor="Red" ErrorMessage="Adresy e-mail muszą być takie same." />
            </li>
            <li>
                <asp:Label ID="Label4" runat="server" AssociatedControlID="Age">Wiek</asp:Label><br />
                <asp:TextBox runat="server" ID="Age" /><br />
                <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" ControlToValidate="Age" ErrorMessage="Wiek jest wymagany"  ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator>
                <asp:RangeValidator ID="NumberRangeValidator" runat="server" ErrorMessage="Wiek poza zakresem" MinimumValue="0" MaximumValue="120" Type="Integer" ControlToValidate="Age" Display="Dynamic"></asp:RangeValidator>
            </li>
            
        </ol>
        <asp:Button ID="Submit" runat="server" Text="Wyslij" />
    </fieldset>

    <p class="info">
        <asp:Label ID="Info" Text="info" Visible="False" runat="server"></asp:Label>
    </p>
</asp:Content>
