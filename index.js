// import React from 'react';
// import ReactDOM from 'react-dom';

import { ApolloClient, createHttpLink, InMemoryCache, gql } from '@apollo/client';
import { setContext } from '@apollo/client/link/context';

const httpLink = new createHttpLink({
  uri: 'https://demo.baanreserveren.nl/graphql/club',
  fetchOptions: {
     mode: 'no-cors'
  }
});

const hashAuth = btoa('API-BR-debook:APIkasdfhoisfh340rtu3fnr3ewfhr3gewy8h03g');

const authLink = setContext((_, { headers }) => {
  return {
     headers: {
        ...headers,
        Authorization: 'Basic ' + hashAuth,
     }
  }
});

const client = new ApolloClient({
  link: authLink.concat(httpLink),
  cache: new InMemoryCache(),
});

client
  .query({
    query: gql`
      query {
        court_reservations(dates: ["2021-02-05"], resources: [1999]) {
          total
          nodes {
            resource {
              name
            }
            start_time
            end_time
          }
        }
      }
    `
  })
  .then(result => console.log(result));
