using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Red_Assignment_1
{
    class Customer
    {
        //so I changed the type from integer to string, to be able to use Guid
        //Also, I used a read only property. because I like it this way :)
        public string CustomerId { get; } = Guid.NewGuid().ToString();

        public string Name { get; }         // name
        public string Email { get; }        // email address
        public DateTime DOB { get; }        // date of birth
        public DateTime SignUpDate { get; } // sign-up date
        private List<BankAccount> Accounts = new List<BankAccount>();

        //Contructor for a Customer
        //this is a bit tricky. DateTime? allows us to set a null value for a date.
        //i had to do this, because parameters must be constant values, and DateTime is not.
        //Instead, if we don't get any paramteres, we set it to null, and later change it
        public Customer(string Name, string Email, DateTime DateOfBirth, DateTime? SignUpDate = null)
        {
            //if we didn't assign anything to the sign up date, we get the current time
            if (!SignUpDate.HasValue)
            {
                SignUpDate = DateTime.Now;
            }
            this.SignUpDate = SignUpDate.Value;
            this.Name = Name;
            this.Email = Email;
            this.DOB = DateOfBirth;
        }

        //The bank account nested class. I did like this, because the task says, the bank 
        //account should be restricted to the customer, and cannot be accessed anywhere else.
        class BankAccount
        {
            //also needs to be a random number, but Guid is more unique
            public string AccountId { get; } = Guid.NewGuid().ToString();
            private decimal Balance;
            private string CustomerId; 

            //Contructor for a bank account
            public BankAccount(string customerId)
            {
                this.Balance = 0;
                this.CustomerId = customerId;
            }

            public void Deposit(decimal amount)
            {
                this.Balance = this.Balance + amount;
            }
            //if we can't withdraw enough money, we just return with false and do nothing else
            public bool Withdraw (decimal amount)
            {
                if (amount <= this.Balance)
                {
                    this.Balance = this.Balance - amount;
                    return true;
                } else
                {
                    return false;
                }
               
            }

            public void Info()
            {
                Console.WriteLine($"Account ID: {this.AccountId}, Balance: {this.Balance}");
            }
        }

        public void Info()
        {
            Console.WriteLine($"Customer info for {this.CustomerId}");
            Console.WriteLine($"Name: {this.Name}");
            Console.WriteLine($"Date of birth: {this.DOB}");
            Console.WriteLine($"E-mail address: {this.Email}");
            Console.WriteLine($"Signed-up: {this.SignUpDate}");
        }

        public void CreateBankAccount()
        {
            BankAccount newAcc = new BankAccount(this.CustomerId);
            Accounts.Add(newAcc);
        }

        public void DepositToAccount (decimal amount, int accountIndex)
        {
            Accounts[accountIndex].Deposit(amount);
        }
        
        public bool WithdrawFromAccount(decimal amount, int accountIndex)
        {
            if (Accounts[accountIndex].Withdraw(amount))
            {
                return true;
            } else
            {
                return false;
            }            
        }

        public void ListAccounts()
        {
            for (int i = 0; i < Accounts.Count(); i++)
            {
                Accounts[i].Info();
            }
        }

        public void ListAccount(int accountIndex)
        {            
            Accounts[accountIndex].Info();
        }

    }
}
