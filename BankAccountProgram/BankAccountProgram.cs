using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace CustomerBankAccount
{
    class Customer
    {
        //attributes
        public Name custName = new Name();
        public Address custAddr = new Address();

        int customerId;
        double accountBalance;
        double totalDeposits;
        double totalWithDrawals;

        // methods

        public int getId()
        {
            return customerId;
        }
        public double getBalance()
        {
            return accountBalance;
        }
        public double getTotalDeposits()
        {
            return totalDeposits;
        }
        public double getTotalWithdrawals()
        {
            return totalWithDrawals;
        }
        public void processDeposit(double depositAmount)
        {
            accountBalance += depositAmount;
            totalDeposits += depositAmount;
        }
        public bool processWithdrawal(double withdrawalAmount)
        {
            if (withdrawalAmount > accountBalance)
            {
                Console.WriteLine("Insufficient Funds, Your account balance is {0}", accountBalance);
                return false;
            }
            else
            {
                accountBalance -= withdrawalAmount;
                totalWithDrawals += withdrawalAmount;
                return true;
            }
        }

        public Customer()
        {
            //Name custName = new Name();
            //Address custAddr = new Address();

            Console.WriteLine("What is the customer's Id?");
            customerId = int.Parse(Console.ReadLine());
            Console.WriteLine("What is your account balance?");
            accountBalance = double.Parse(Console.ReadLine());
            totalDeposits = 0;
            totalWithDrawals = 0;
        }

    }
    class Name
    {
        string firstName;
        string middleInitial;
        string lastName;
        public void displayName()
        {
        }
        public string getFirstName()
        {
            return firstName;
        }
        public string getMiddleName()
        {
            return middleInitial;
        }
        public string getLastName()
        {
            return lastName;
        }

        public Name()
        {
            Console.WriteLine("What is your first name: ");
            firstName = Console.ReadLine();
            Console.WriteLine("What is your middle initial?");
            middleInitial = Console.ReadLine();
            Console.WriteLine("What is your last name?");
            lastName = Console.ReadLine();
        }

    }

    class Address
    {
        string streetName;
        string cityName;
        string state;
        int zipCode;

        public void displayName()
        {
        }
        public string getStreetName()
        {
            return streetName;
        }
        public string getCityName()
        {
            return cityName;
        }
        public string getState()
        {
            return state;
        }

        public Address()
        {
            Console.WriteLine("What is your street address?");
            streetName = Console.ReadLine();
            Console.WriteLine("What is the city name?");
            cityName = Console.ReadLine();
            Console.WriteLine("What is your state?");
            state = Console.ReadLine();
            Console.WriteLine("What is your zip code?");
            zipCode = int.Parse(Console.ReadLine());


        }


    }
    class TestCustomer
    {

        static void Main(string[] args)
        {
            double startingBalance;
            double deposit;
            double withDrawal;
            char choice;
            Customer cust = new Customer();
            Console.Clear();
            startingBalance = cust.getBalance();

            while (true)
            {
                Console.WriteLine("1.Deposit\n2.Withdrawal\n3.Balance\n9.Exit\nPlease choose: ");
                choice = char.Parse(Console.ReadLine());
                switch (choice)
                {
                    case '1':
                        Console.WriteLine("What is the deposit amount?");
                        deposit = double.Parse(Console.ReadLine());
                        cust.processDeposit(deposit);
                        break;
                    case '2':
                        Console.WriteLine(" What is the withdrawal amount?");
                        withDrawal = double.Parse(Console.ReadLine());
                        cust.processWithdrawal(withDrawal);
                        break;
                    case '3':
                        Console.WriteLine("Your account balance is : " + cust.getBalance());
                        Console.ReadLine();
                        break;
                    case '9':
                            Console.WriteLine("Summary of Activity");
                            Console.WriteLine("First Name:" + cust.custName.getFirstName());
                            Console.WriteLine("Middle Initial:" + cust.custName.getMiddleName());
                            Console.WriteLine("Last Name:" + cust.custName.getLastName());
                            Console.WriteLine();
                            Console.WriteLine("Street Address: " + cust.custAddr.getStreetName());
                            Console.WriteLine("City: " + cust.custAddr.getCityName());
                            Console.WriteLine("State: " + cust.custAddr.getState());
                            Console.WriteLine();
                            Console.WriteLine("Customer Id: " + cust.getId());
                            Console.WriteLine("Starting Balance: " + startingBalance);
                            Console.WriteLine();
                            Console.WriteLine("Total Deposits: " + cust.getTotalDeposits());
                            Console.WriteLine("Total Withdrawals: " + cust.getTotalWithdrawals());
                            Console.WriteLine();
                            Console.WriteLine("Closing Balance: " + cust.getBalance());
                            Environment.Exit(0);                        
                        break;                        
                    default:
                        Console.WriteLine("Invalid input.\nTry again.\n\n");
                        Console.ReadLine();
                        break;
                }
                Console.Clear();
            }
        }
    }
}
