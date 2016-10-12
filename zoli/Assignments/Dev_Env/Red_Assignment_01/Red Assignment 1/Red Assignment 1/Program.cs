using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Red_Assignment_1
{
    class Program
    {
        static void Main(string[] args)
        {
            //Task Description:
            //Based on the UML diagram build a part of a banking system.
            //Build the 2 classes and test them through the program class.
            //Demo the finished system to me within 2 weeks from the day the assignment was given.
            //If you are not able to show up in person and demo your system, i will accept a youtube video
            //where you go through your code, if uploaded before the deadline of the demo.

            DateTime birthdate = new DateTime(1995, 1, 15);

            Customer Jozsi = new Customer("Jozsi", "jozsi@pistanet.com", birthdate, new DateTime(2016, 1, 15, 16, 28, 12));

            birthdate = new DateTime(1992, 2, 20);

            Customer Pista = new Customer("Pista", "pista@pistanet.com", birthdate);


            Jozsi.Info();
            Console.WriteLine();            
            Jozsi.CreateBankAccount();
            Jozsi.CreateBankAccount();
            Jozsi.DepositToAccount(100, 0);
            Jozsi.DepositToAccount(200, 1);
            Jozsi.ListAccounts();
            Console.WriteLine(Jozsi.WithdrawFromAccount(50, 0));
            Console.WriteLine(Jozsi.WithdrawFromAccount(200, 1)); 
            Jozsi.ListAccounts();

            Console.WriteLine("-----------------");
            
            Pista.Info();
            Console.WriteLine();
            Pista.CreateBankAccount();
            Pista.CreateBankAccount();
            Pista.DepositToAccount(1000, 0);
            Pista.DepositToAccount(10000, 1);
            Pista.ListAccounts();
            Console.WriteLine(Pista.WithdrawFromAccount(50, 0));
            Console.WriteLine(Pista.WithdrawFromAccount(200, 1));
            Pista.ListAccounts();


            Console.ReadKey();
        }
    }
}
