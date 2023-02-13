import { Text } from '@chakra-ui/react';

type props = {
  children: string;
};

export const MainText = (props: props) => {
  const { children } = props;
  return <Text>{children}</Text>;
};
